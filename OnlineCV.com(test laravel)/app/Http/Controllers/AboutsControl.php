<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class AboutsControl extends Controller
{
    function list(){
        $data = Profile::all();
        return view('index',['profiles'=>$data]);
    }

    function delete($id){
        $data = Profile::find($id);
        $data ->delete();
       return redirect('index');
    }

    function showData($id){
        $data = Profile::find($id);
        return view('Aboutsedit',['profiles'=>$data]);
    }
    function edit(Request $req){
        $data = Profile::find($req->id);
       $data -> about= $req->about;
       $data -> save();
       return view('index');
    }

}
