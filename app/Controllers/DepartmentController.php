<?php

namespace App\Controllers;

use App\Models\Department;

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

    public function store()
    {
        $department = new Department();
        $data = [
            'name' => $this->request->getVar('name'),
            'description'  => $this->request->getVar('description'),
            'status'  => $this->request->getVar('status'),
        ];
        $department->insert($data);
        return $this->response->redirect(base_url('/'));
    }
}
