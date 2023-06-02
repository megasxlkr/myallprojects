<?php

namespace App\Http\Controllers;

use App\Implements\IBaseController;
use Illuminate\Http\Request;

use App\Models\abouts;

class aboutscontroller extends Controller implements IBaseController
{

    public function index()
    {
        $data = abouts::all();
        return view('iletisimsonuc',[
            'abouts'=>$data
        ]);
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function detail($id = null)
    {
        return $id;
    }
}
