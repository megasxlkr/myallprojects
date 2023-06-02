<?php

namespace App\Implements;

interface IBaseController
{
    public function index();
    public function store();
    public function delete();
    public function update();
    public function detail($id = null);
}
