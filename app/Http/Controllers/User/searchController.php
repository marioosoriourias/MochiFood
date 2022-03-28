<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search()
    {
        return view('user.search');
    }
}
