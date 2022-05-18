<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
    public function index()
    {
        $users = new User();
        $data['users'] = $users->orderBy('id', 'DESC')->findAll();
        return view('dashboard',$data);
    }
}
