<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    //RELACION MUCHOS A MUCHOS
    public function companies(){
        return $this->belongsToMany('App\Models\Company');
    }

    //RELACION UNO A UNO POLIMORFICAs
    //*
    public function image_category(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
