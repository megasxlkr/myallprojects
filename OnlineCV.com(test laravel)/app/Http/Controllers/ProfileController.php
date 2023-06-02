<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update($nickname = null){
        $data   = Profile::where('nickname',$nickname)->first();
        return view('edit-profile',[
            'data'  => $data
        ]);
    }

    public function updateResult(Request $request){
            $inputs = $request->all();
            $data   = Profile::updateOrCreate([
                'id' => $request->id
            ],$inputs
        );

            return redirect()->route('index');
    }



}
