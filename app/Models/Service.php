<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    //RELACION MUCHOS A MUCHOS
    public function addresses(){
        return $this->belongsToMany('App\Models\Address');
    }
}
