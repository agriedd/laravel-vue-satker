<?php

namespace App\Http\Controllers\Api;

use App\Bidang;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreBidang;
use App\Http\Requests\RequestUpdateBidang;
use App\Http\Resources\BidangCollection;
use App\Http\Resources\CountCollection;
use App\Response\Res;

class BidangController extends Controller{

    public function index(){
        return BidangCollection::collection(
            Bidang::when(request()->filled('search'), function($query){
                $search = request('search');
                return $query->where('nama_bidang', 'like', "%{$search}%");
            })
            ->when(request()->filled('id_satker'), function($query){
                return $query->where('id_satker', request('id_satker'));
            })
            ->when(request()->filled('id_bidang'), function($query){
                $query->whereRaw('1');
                $query->orWhere('id_bidang', request('id_bidang'));
            })
            ->when(request()->filled('sortBy'), function($query){
                $sortBy = is_array(request('sortBy')) ? request('sortBy')[0] : request('sortBy');
                $sortDesc = is_array(request('sortDesc')) ? request('sortDesc')[0] : request('sortDesc');
                return $query->orderBy($sortBy, $sortDesc == 'true' ? 'DESC' : 'ASC');
            })
            ->withCount(['petugas', 'kegiatan'])
            ->paginate(request('itemsPerPage') ?? 10)
        );
    }

    public function count(){
        return new CountCollection(
            Bidang::when(request()->filled('search'), function($query){
                $search = request('search');
                return $query->where('nama_bidang', 'like', "%{$search}%");
            })
            ->when(request()->filled('id_satker'), function($query){
                return $query->where('id_satker', request('id_satker'));
            })
            ->when(request()->filled('id_bidang'), function($query){
                return $query->orWhere('id_bidang', request('id_bidang'));
            })
            ->count()
        );
    }
    public function store(RequestStoreBidang $request){
        $data = $request->validated();
        return Res::store(
            Bidang::create($data)
        );
    }

    public function show(Bidang $bidang){
        return new BidangCollection($bidang);
    }

    public function update(RequestUpdateBidang $request, Bidang $bidang){
        $data = $request->validated();
        return Res::update(
            $bidang->update($data)
        );
    }

    public function destroy(Bidang $bidang){
        return Res::delete($bidang->delete());
    }
}
