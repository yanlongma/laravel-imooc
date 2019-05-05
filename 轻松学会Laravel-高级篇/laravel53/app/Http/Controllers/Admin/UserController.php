<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        echo route('a-u-i');

        return 'admin.user.index';
    }

    public function create()
    {
        return 'admin.user.create';
    }


}