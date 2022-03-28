<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class HomeController extends Controller
{
    
    public function __invoke()
    {

        $cookie_ciudad = Cookie::get('city_id');
        if(empty($cookie_ciudad))
        {
            Cookie::queue('city_id', 1, time()+31556926);
        }
        else{
            echo Cookie::get('city_id');
        }
       // $city_id = cookie('city_id', 'valor', time()+31556926);
       
        return view('user.home');
    }

    public function setCookie($id){
        Cookie::queue('city_id', $id, time()+31556926);
        return redirect()->route('home');
     }

}
