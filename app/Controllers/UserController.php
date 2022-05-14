<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Users;
use App\Models\Department;
use App\Models\Designation;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        //
    }

    public function create()
    {
        helper (['form']);
        $depts = new Department();
        $data['departments'] = $depts->orderBy('id', 'DESC')->findAll();

        $designations = new Designation();
        $data['designations'] = $designations->orderBy('id', 'DESC')->findAll();
        // print_r($data['departments']);
        return view('users/create',$data);
    }

    public function store()
    {
        helper (['form']);
        $input = $this->validate([
            'f_name' => 'required|max_length[20]',
            'l_name' => 'required|max_length[20]',
            'email' => 'required|max_length[30]',
            'phone' => 'required|max_length[15]',
            'password' => 'required|max_length[10]|min_length[6]',
        ]);

        if (!$input) {
            $depts = new Department();
            $data['departments'] = $depts->orderBy('id', 'DESC')->findAll();

            $designations = new Designation();
            $data['designations'] = $designations->orderBy('id', 'DESC')->findAll();
            echo view('users/create',$data, [
                'validation' => $this->validator
            ]);
        }else{

            $user = new User();
            $data = [
                'f_name' => $this->request->getVar('f_name'),
                'l_name' => $this->request->getVar('l_name'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'designation_id' => $this->request->getVar('designation'),
                'department_id' => $this->request->getVar('department'),
                'note'  => $this->request->getVar('note'),
                'password'  => $this->request->getVar('password'),
                'status'  => $this->request->getVar('status'),
            ];
            $user->insert($data);
            // return $this->response->redirect(base_url('/'));
        }

    }
}
