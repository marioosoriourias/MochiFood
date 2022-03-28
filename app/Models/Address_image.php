<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address_image extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

     //RELACION UNO A MUCHOS INVERSA
    public function address(){
        return $this->belongsTo('App\Models\Address');
    }

}
