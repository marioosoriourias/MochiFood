<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_type extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //RELACION UNO A MUCHOS
    public function companies(){
        return $this->hasMany('App\Models\Company');
    }

}
