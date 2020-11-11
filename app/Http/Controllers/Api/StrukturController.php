<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreStruktur;
use App\Http\Requests\RequestUpdateStruktur;
use App\Http\Resources\CountCollection;
use App\Http\Resources\StrukturCollection;
use App\Response\Res;
use App\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller{

    public function index(){
        return StrukturCollection::collection(
            StrukturOrganisasi::when(request()->filled('search'), function($query){
                $search = request('search');
                // return $query->where('id_', 'like', "%{$search}%");
            })
            ->when(request()->filled('id_satker'), function($query){
                return $query->where('id_satker', request('id_satker'));
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
            StrukturOrganisasi::when(request()->filled('search'), function($query){
                $search = request('search');
                // return $query->where('id_', 'like', "%{$search}%");
            })
            ->when(request()->filled('id_satker'), function($query){
                return $query->where('id_satker', request('id_satker'));
            })
            ->when(request()->filled('sortBy'), function($query){
                $sortBy = is_array(request('sortBy')) ? request('sortBy')[0] : request('sortBy');
                $sortDesc = is_array(request('sortDesc')) ? request('sortDesc')[0] : request('sortDesc');
                return $query->orderBy($sortBy, $sortDesc == 'true' ? 'DESC' : 'ASC');
            })
            ->count()
        );
    }

    public function store(RequestStoreStruktur $request){
        $data = $request->validated();
        if($request->gambar){
            $nama_gambar = $request->gambar->store('/struktur', 'public');
            $data['gambar'] = $nama_gambar;
        }
        return Res::store(
            StrukturOrganisasi::create($data)
        );
    }

    public function show(StrukturOrganisasi $struktur){
        return new StrukturCollection($struktur);
    }

    public function update(RequestUpdateStruktur $request, StrukturOrganisasi $struktur){
        $data = $request->validated();
        if($request->gambar){
            $nama_gambar_old = $struktur->gambar;
            $nama_gambar = $request->gambar->store('/struktur', 'public');
            $data['gambar'] = $nama_gambar;
            if($nama_gambar && Storage::disk('public')->exists($nama_gambar_old)){
                Storage::disk('public')->delete($nama_gambar_old);
            }
        }
        return Res::update(
            $struktur->update($data)
        );
    }

    public function destroy(StrukturOrganisasi $struktur){
        return Res::delete(
            $struktur->delete()
        );
    }
}
