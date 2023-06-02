<?php

namespace App\Http\Controllers;

use App\Models\Profileall;
use Illuminate\Http\Request;

class ProfileallController extends Controller
{
    public function allupdate($username = null){
        $data   = Profileall::where('username',$username)->first();
        return view('edit-all-profile-infos',[
            'data'  => $data
        ]);
    }

    public function allupdateResult(Request $request){
        $inputs = $request->all();
        $data   = Profileall::updateOrCreate([
            'id' => $request->id
        ],$inputs
        );

        return redirect()->route('index');
    }

}
