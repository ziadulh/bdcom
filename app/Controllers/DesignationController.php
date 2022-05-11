<?php

namespace App\Controllers;

use App\Models\Designation;

class DesignationController extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function index()
    {
        $designations = new Designation();
        $data['designations'] = $designations->orderBy('id', 'DESC')->findAll();
        return view('designations/list', $data);
    }

    public function create()
    {
        return view('designations/create');
    }

    public function store()
    {
        $input = $this->validate([
            'name' => 'required|max_length[20]',
        ]);

        if (!$input) {
            echo view('designations/create', [
                'validation' => $this->validator
            ]);
        }else{

            $designations = new Designation();
            $data = [
                'name' => $this->request->getVar('name'),
                'description'  => $this->request->getVar('description'),
                'status'  => $this->request->getVar('status'),
            ];
            $designations->insert($data);
            return $this->response->redirect(base_url('/designations'));
        }

    }
    
    public function edit($id=null)
    {
        $designation = new Designation();
        $data['designation'] = $designation->where('id', $id)->first();
        return view('designations/edit', $data);
    }

    public function update($id=null)
    {

        $validation =  \Config\Services::validation();

        $validation->setRule('name', 'Name', 'required');

        if ($validation->withRequest($this->request)->run()):
            $designation = new Designation();
            $data = [
                'name' => $this->request->getVar('name'),
                'description'  => $this->request->getVar('description'),
                'status'  => $this->request->getVar('status'),
            ];
            $designation->update($id, $data);
            return $this->response->redirect(base_url('/designations'));
        else:
            $designation = new Designation();
            $data['designation'] = $designation->where('id', $id)->first();
            return view('designations/edit', $data);
        endif;
        
    }

    public function destroy($id=null)
    {
        $designation = new Designation();
        $data['designation'] = $designation->where('id', $id)->delete($id);
        return $this->response->redirect(base_url('/designations'));
    }
}
