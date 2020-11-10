<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreAdmin;
use App\Http\Requests\RequestUpdateAdmin;
use App\Http\Resources\AdminCollection;
use App\Response\Res;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller{

    public function index(){
        return AdminCollection::collection(
            User::when(request()->filled('search'), function($query){
                $search = request('search');
                return $query->where('nama', 'like', "%{$search}%");
            })
            ->when(request()->filled('sortBy'), function($query){
                $sortBy = is_array(request('sortBy')) ? request('sortBy')[0] : request('sortBy');
                $sortDesc = is_array(request('sortDesc')) ? request('sortDesc')[0] : request('sortDesc');
                return $query->orderBy($sortBy, $sortDesc ? 'DESC' : 'ASC');
            })
            ->paginate(request('itemsPerPage') ?? 10)
        );
    }

    public function store(RequestStoreAdmin $request){
        $data = $request->validated();
        return Res::store(
            User::create($data)
        );
    }

    public function show(User $admin){
        return new AdminCollection($admin);
    }

    public function update(RequestUpdateAdmin $request, User $admin){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        return Res::update(
            $admin->update($data)
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin){
        return Res::delete(
            $admin->delete()
        );
    }
}
