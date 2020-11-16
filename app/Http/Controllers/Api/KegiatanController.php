<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreKegiatan;
use App\Http\Requests\RequestUpdateKegiatan;
use App\Http\Resources\CountCollection;
use App\Http\Resources\KegiatanCollection;
use App\Kegiatan;
use App\Response\Res;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller{

    public function index(){
        return KegiatanCollection::collection(
            Kegiatan::when(request()->filled('search'), function($query){
                $search = request('search');
                return $query->where('nama_kegiatan', 'like', "%{$search}%");
            })
            ->when(request()->filled('id_bidang'), function($query){
                return $query->where('id_bidang', request('id_bidang'));
            })
            ->when(request()->filled('id_kegiatan'), function($query){
                return $query->orWhere('id_kegiatan', request('id_kegiatan'));
            })
            ->when(request()->filled('sortBy'), function($query){
                $sortBy = is_array(request('sortBy')) ? request('sortBy')[0] : request('sortBy');
                $sortDesc = is_array(request('sortDesc')) ? request('sortDesc')[0] : request('sortDesc');
                return $query->orderBy($sortBy, $sortDesc == 'true' ? 'DESC' : 'ASC');
            })
            ->paginate(request('itemsPerPage') ?? 10)
        );
    }

    public function count(){
        return new CountCollection(
            Kegiatan::when(request()->filled('search'), function($query){
                $search = request('search');
                return $query->where('nama_kegiatan', 'like', "%{$search}%");
            })
            ->when(request()->filled('id_bidang'), function($query){
                return $query->where('id_bidang', request('id_bidang'));
            })
            ->when(request()->filled('id_kegiatan'), function($query){
                return $query->where('id_kegiatan', request('id_kegiatan'));
            })
            ->count()
        );
    }
    public function store(RequestStoreKegiatan $request){
        $data = $request->validated();
        if($request->gambar){
            $nama_gambar = $request->gambar->store('/kegiatan', 'public');
            $data['gambar'] = $nama_gambar;
        }
        return Res::store(
            Kegiatan::create($data)
        );
    }

    public function show(Kegiatan $kegiatan){
        return new KegiatanCollection($kegiatan);
    }

    public function update(RequestUpdateKegiatan $request, Kegiatan $kegiatan){
        $data = $request->validated();
        if($request->gambar){
            $nama_gambar_old = $kegiatan->gambar;
            $nama_gambar = $request->gambar->store('/kegiatan', 'public');
            $data['gambar'] = $nama_gambar;
            if($nama_gambar && Storage::disk('public')->exists($nama_gambar_old)){
                Storage::disk('public')->delete($nama_gambar_old);
            }
        }
        return Res::update(
            $kegiatan->update($data)
        );
    }

    public function destroy(Kegiatan $kegiatan){
        return Res::delete($kegiatan->delete());
    }
}
