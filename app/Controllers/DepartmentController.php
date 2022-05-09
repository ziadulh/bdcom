<?php

namespace App\Controllers;

class DepartmentController extends BaseController
{
    public function index()
    {
        return "department";
    }

    public function create()
    {
        return view('departments/create');
    }
}
