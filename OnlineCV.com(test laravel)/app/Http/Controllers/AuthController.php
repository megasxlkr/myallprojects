<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\iletisim;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    function login()
    {
        return view('login');
    }

    function register()
    {
        return view('register');
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    function loginResult(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!$user)
            return "Kullanıcı Bulunamadı";
        $check = Hash::check($request->password, $user->password);
        if (!$check)
            return "Şifre Hatalı";
        Auth::login($user);
        return redirect()->route('index');
    }
    function AdminLogin(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if (!$user)
            return "Kullanıcı Bulunamadı";
        $check = Hash::check($request->password, $user->password);
        if (!$check)
            return "Şifre Hatalı";
        Auth::login($user);
        return redirect()->route('index');
    }
    function registerResult(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            Auth::login($user);
            return redirect()->route('index');
        }
        return "Kayıt hatası";
    }



    function sendmessage(Request $request)
    {
        $iletisim = new Iletisim();
        $iletisim->subject;
        $iletisim->text;
        $iletisim->save();
    }
}
