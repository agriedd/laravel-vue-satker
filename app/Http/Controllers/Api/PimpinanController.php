<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStorePimpinan;
use App\Pimpinan;
use App\Response\Res;
use Illuminate\Http\Request;

class PimpinanController extends Controller{

    public function index(){
    
    }

    public function store(RequestStorePimpinan $request){
        $data = $request->validated();
        return Res::store(
            Pimpinan::create($data)
        );
    }

    public function show($id){
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
