<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\Department;
use App\Models\Designation;
use App\Models\User;

class UserController extends BaseController
{

    public $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function index()
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('users');
        // $builder->select('users.id, users.*');
        // $builder->join('departments', 'departments.id = users.department_id');
        // $builder->join('designations', 'designations.id = users.designation_id');
        // $query = $builder->get();
        // $users = $query->getResult();

        // $data['users'] = $users;
        // return view('users/list', $data);
        return view('users/list');
    }

    public function ajaxDataTables()
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('users');
        // $builder->select('users.f_name, users.note, users.status, departments.name');
        // // $builder->select('users.id, users.*');
        // $builder->join('departments', 'departments.id = users.department_id');
        // $builder->join('designations', 'designations.id = users.designation_id');
        // // $query = $builder->get();
        // // $users = $query->getResult();

        // // $builder = [['name','name', 'name', 'name', 'name'], ['name','name', 'name', 'name', 'name']];
          
        // return DataTable::of($builder)
        //        ->addNumbering() //it will return data output with numbering on first column
        //        ->toJson();

        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];
        /* If we pass any extra data in request from ajax */
        //$value1 = isset($_REQUEST['key1'])?$_REQUEST['key1']:"";

        /* Value we will get from typing in search */
        $search_value = $_REQUEST['search']['value'];

        if(!empty($search_value)){
            // If we have value in search, searching by id, name, email, mobile

            // count all data
            $total_count = $this->db->query("SELECT * from users WHERE id like '%".$search_value."%' OR f_name like '%".$search_value."%' OR l_name like '%".$search_value."%' OR email like '%".$search_value."%' OR phone like '%".$search_value."%'")->getResult();

            $data = $this->db->query("SELECT * from users WHERE id like '%".$search_value."%' OR f_name like '%".$search_value."%' OR l_name like '%".$search_value."%' OR email like '%".$search_value."%' OR phone like '%".$search_value."%' limit $start, $length")->getResult();
        }else{
            // count all data
            $total_count = $this->db->query("SELECT * from users")->getResult();

            // get per page data
            $data = $this->db->query("SELECT * from users limit $start, $length")->getResult();
        }

        foreach ($data as $key => $value) {
            $value->name = $value->f_name.' '.$value->l_name;
            $value->status = $value->status == '1' ? 'Yes' : 'No';
            $value->action = '<form action="'.base_url('departments/delete/'.$value->id).'" method="POST">
            <input type="hidden" name="_method" value="DELETE">
                <a href="'.base_url('departments/edit/'.$value->id).'" class="btn btn-warning"><i class="fas fa-edit fa-sm"></i></a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('.'Are you sure?'.')"><i class="fas fa-trash fa-sm"></i></button>
            </form>';
        }
        
        $json_data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
        // echo json_encode($json_data);
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
            'email' => 'required|max_length[30]|valid_email|is_unique[users.email]',
            'phone' => 'required|max_length[15]',
            'password' => 'required|max_length[50]|min_length[6]',
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
                'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status'  => $this->request->getVar('status'),
            ];
            $user->insert($data);
            return $this->response->redirect(base_url('users/'));
        }

    }

    public function edit($id=null)
    {
        $user = new User();
        $data['user'] = $user->where('id', $id)->first();
        $depts = new Department();
        $data['departments'] = $depts->orderBy('id', 'DESC')->findAll();

        $designations = new Designation();
        $data['designations'] = $designations->orderBy('id', 'DESC')->findAll();
        // print_r($data);
        return view('users/edit', $data);
    }

    public function update($id=null)
    {

        helper (['form']);
        $user = new User();
        $data['user'] = $user->where('id', $id)->first();
        $input = $this->validate([
            'f_name' => 'required|max_length[20]',
            'l_name' => 'required|max_length[20]',
            'email' => 'required|max_length[30]|valid_email|is_unique[users.email,id,'.$id.']',
            'phone' => 'required|max_length[15]',
            'password' => 'required|max_length[50]|min_length[6]',
        ]);

        if (!$input) {
            
            $depts = new Department();
            $data['departments'] = $depts->orderBy('id', 'DESC')->findAll();

            $designations = new Designation();
            $data['designations'] = $designations->orderBy('id', 'DESC')->findAll();
            echo view('users/edit',$data, [
                'validation' => $this->validator
            ]);
        }else{

            $data = [
                'f_name' => $this->request->getVar('f_name'),
                'l_name' => $this->request->getVar('l_name'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'designation_id' => $this->request->getVar('designation'),
                'department_id' => $this->request->getVar('department'),
                'note'  => $this->request->getVar('note'),
                'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status'  => $this->request->getVar('status'),
            ];
            
            $user = new User();
            $user->update($id, $data);
            return $this->response->redirect(base_url('/users'));
        }
        
    }

    public function destroy($id=null)
    {
        $designation = new Designation();
        $data['designation'] = $designation->where('id', $id)->delete($id);
        return $this->response->redirect(base_url('/designations'));
    }
}
