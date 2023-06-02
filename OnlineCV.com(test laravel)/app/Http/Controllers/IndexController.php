<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $data   = Profile::all();
     return view('index',[
         'veri' => $data
     ]);
    }
}
