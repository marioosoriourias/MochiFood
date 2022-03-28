<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //RELACION UNO A MUCHOS
    public function addresses(){
        return $this->hasMany('App\Models\Address');
    }
}
