<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\abouts;

class MemberController extends Controller
{
    function addData(Request $req){

        $member = new abouts;
        $member -> subject=$req->subject;
        $member -> text=$req->text;
        $member -> save();

        return redirect()->route('index');

    }
}
