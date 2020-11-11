<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStorePetugas;
use App\Http\Requests\RequestUpdatePetugas;
use App\Http\Resources\CountCollection;
use App\Http\Resources\PetugasCollection;
use App\Petugas;
use App\Response\Res;
use Illuminate\Http\Request;

class PetugasController extends Controller{

    public function index(){
        return PetugasCollection::collection(
            Petugas::when(request()->filled('search'), function($query){
                $search = request('search');
                return $query->where('nama', 'like', "%{$search}%");
            })
            ->when(request()->filled('id_bidang'), function($query){
                return $query->where('id_bidang', request('id_bidang'));
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
            Petugas::when(request()->filled('search'), function($query){
                $search = request('search');
                return $query->where('nama', 'like', "%{$search}%");
            })
            ->when(request()->filled('id_bidang'), function($query){
                return $query->where('id_bidang', request('id_bidang'));
            })
            ->count()
        );
    }
    public function store(RequestStorePetugas $request){
        $data = $request->validated();
        return Res::store(
            Petugas::create($data)
        );
    }

    public function show(Petugas $petuga){
        return new PetugasCollection($petuga);
    }

    public function update(RequestUpdatePetugas $request, Petugas $petuga){
        $data = $request->validated();
        return Res::update(
            $petuga->update($data)
        );
    }

    public function destroy(Petugas $petuga){
        return Res::delete($petuga->delete());
    }
}
