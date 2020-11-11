<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountCollection extends JsonResource{
    public function toArray($request){
        return [
            "data" => $this->resource
        ];
    }
}
