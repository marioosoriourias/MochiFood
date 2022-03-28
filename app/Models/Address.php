<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    //RELACION UNO A MUCHOS INVERSA
    public function city(){
        return $this->belongsTo('App\Models\City');
    }

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }

    //RELACION UNO A MUCHOS
    public function images(){
        return $this->hasMany('App\Models\Address_Image');
    }


    //RELACION MUCHOS A MUCHOS
    public function services(){
        return $this->belongsToMany('App\Models\Service');
    }

    public function payments(){
        return $this->belongsToMany('App\Models\Payment');
    }


     //RELACION UNO A UNO POLIMORFICA
    //*
    public function image_address(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
