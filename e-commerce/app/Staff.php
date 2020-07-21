<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function products(){
        return $this->hasMany(Product::class);
    }
}
