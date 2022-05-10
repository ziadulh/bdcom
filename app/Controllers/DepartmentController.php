<?php

namespace App\Controllers;

use App\Models\Department;

class DepartmentController extends BaseController
{
    public function index()
    {
        $depts = new Department();
        $data['departments'] = $depts->orderBy('id', 'DESC')->findAll();
        return view('departments/list', $data);
    }

    public function create()
    {
        helper (['form']);
        return view('departments/create');
    }

    public function store()
    {
        helper (['form']);
        $input = $this->validate([
            'name' => 'required|max_length[20]',
        ]);

        if (!$input) {
            echo view('departments/create', [
                'validation' => $this->validator
            ]);
        }else{

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
    
    public function edit($id=null)
    {
        $department = new Department();
        $data['department'] = $department->where('id', $id)->first();
        return view('departments/edit', $data);
    }

    public function update($id=null)
    {

        $validation =  \Config\Services::validation();

        $validation->setRule('name', 'Name', 'required');

        if ($validation->withRequest($this->request)->run()):
            $department = new Department();
            $data = [
                'name' => $this->request->getVar('name'),
                'description'  => $this->request->getVar('description'),
                'status'  => $this->request->getVar('status'),
            ];
            $department->update($id, $data);
            return $this->response->redirect(base_url('/departments'));
        else:
            $department = new Department();
            $data['department'] = $department->where('id', $id)->first();
            return view('departments/edit', $data);
        endif;
        
    }

    public function destroy($id=null)
    {
        $department = new Department();
        $data['department'] = $department->where('id', $id)->delete($id);
        return $this->response->redirect(base_url('/departments'));
    }
}
