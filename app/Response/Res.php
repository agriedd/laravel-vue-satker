<?php

namespace App\Response;

class Res{
    public static function store($status, $data = null, $success = null, $fail = null){
        $res = collect([]);
        $data = $data ?? $status;

        if($status) $res->put('data', $data);

        $res->put('message', $status 
            ? ($success ?? "Berhasil menambahkan data.")
            : ($fail ?? "Gagal menambahkan data.")
        );
        
        return response()->json($res->all(), $status ? 200 : 409);
    }
    public static function update($status, $data = null, $success = null, $fail = null){
        $res = collect([]);
        $data = $data ?? $status;

        if($status) $res->put('data', $data);

        $res->put('message', $status 
            ? ($success ?? "Berhasil menyimpan perubahan data.")
            : ($fail ?? "Gagal menyimpan perubahan data.")
        );
        return response()->json($res->all(), $status ? 200 : 409);
    }
    public static function delete($status, $success = null, $fail = null){
        $res = collect([]);
        $res->put('message', $status 
            ? ($success ?? "Berhasil menghapus data.")
            : ($fail ?? "Gagal menghapus data.")
        );
        return response()->json($res->all(), $status ? 200 : 409);
    }
    public static function validate($data = null, $message = null){
        $res = collect();
        $res->put('errors', $data);
        $res->put('message', ($message ?? "Gagal menyimpan perubahan data."));
        return response()->json($res->all(), 422);
    }
}
