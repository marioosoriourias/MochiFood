<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    //RELACION UNO A MUCHOS
    public function addresses(){
        return $this->hasMany('App\Models\Address');
    }

    //RELACION UNO A MUCHOS INVERSA
    public function food_type(){
        return $this->belongsTo('App\Models\Food_type');
    }

     //RELACION MUCHOS A MUCHOS
     public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

     //RELACION UNO A UNO POLIMORFICA
    //*
    public function image_logo(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }



}
