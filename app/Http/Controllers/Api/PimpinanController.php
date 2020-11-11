<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStorePimpinan;
use App\Http\Requests\RequestUpdatePimpinan;
use App\Http\Resources\PimpinanCollection;
use App\Pimpinan;
use App\Response\Res;
use Illuminate\Http\Request;

class PimpinanController extends Controller{

    public function index(){
        return PimpinanCollection::collection(
            Pimpinan::when(request()->filled('search'), function($query){
                $search = request('search');
                return $query->where('nama', 'like', "%{$search}%");
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

    public function store(RequestStorePimpinan $request){
        $data = $request->validated();
        return Res::store(
            Pimpinan::create($data)
        );
    }

    public function show(Pimpinan $pimpinan){
        return new PimpinanCollection($pimpinan);
    }

    public function update(RequestUpdatePimpinan $request, Pimpinan $pimpinan){
        $data = $request->validated();
        return Res::update(
            $pimpinan->update($data)
        );
    }

    public function destroy(Pimpinan $pimpinan){
        return Res::delete($pimpinan->delete());
    }
}
