<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreSatker;
use App\Http\Requests\RequestUpdateSatker;
use App\Http\Resources\SatkerCollection;
use App\Response\Res;
use App\Satker;

class SatkerController extends Controller{

    public function index(){
        return SatkerCollection::collection(
            Satker::when(request()->filled('search'), function($query){
                $search = request('search');
                return $query->where('nama', 'like', "%{$search}%");
            })
            ->when(request()->filled('id_satker'), function($query){
                return $query->orWhere('id_satker', (int) request('id_satker'));
            })
            ->when(request()->filled('sortBy'), function($query){
                $sortBy = is_array(request('sortBy')) ? request('sortBy')[0] : request('sortBy');
                $sortDesc = is_array(request('sortDesc')) ? request('sortDesc')[0] : request('sortDesc');
                return $query->orderBy($sortBy, $sortDesc == 'true' ? 'DESC' : 'ASC');
            })
            ->paginate(request('itemsPerPage') ?? 10)
        );
    }

    public function store(RequestStoreSatker $request){
        $data = $request->validated();
        return Res::store(
            Satker::create($data)
        );
    }

    public function show(Satker $satker){
        return new SatkerCollection($satker);
    }

    public function update(RequestUpdateSatker $request, Satker $satker){
        $data = $request->validated();
        return Res::update(
            $satker->update($data)
        );
    }

    public function destroy(Satker $satker){
        return Res::delete($satker->delete());
    }
}
