<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreStruktur;
use App\Http\Resources\StrukturCollection;
use App\Response\Res;
use App\StrukturOrganisasi;
use Illuminate\Http\Request;

class StrukturController extends Controller{

    public function index(){
        return StrukturCollection::collection(
            StrukturOrganisasi::when(request()->filled('search'), function($query){
                $search = request('search');
                // return $query->where('id_', 'like', "%{$search}%");
            })
            ->when(request()->filled('sortBy'), function($query){
                $sortBy = is_array(request('sortBy')) ? request('sortBy')[0] : request('sortBy');
                $sortDesc = is_array(request('sortDesc')) ? request('sortDesc')[0] : request('sortDesc');
                return $query->orderBy($sortBy, $sortDesc ? 'DESC' : 'ASC');
            })
            ->paginate(request('itemsPerPage') ?? 10)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
