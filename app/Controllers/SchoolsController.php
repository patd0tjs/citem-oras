<?php

namespace App\Controllers;
use App\Models\SchoolModel;

class SchoolsController extends BaseController
{
    public function index()
    {
        $school = new SchoolModel();
        $data = [
            'page' => 'Schools',
            'schools' =>$school->findAll()
        ];
        
        return view('admin/schools', $data);
    }

    public function create()
    {
        $school = new SChoolModel();
        $data['name'] = $this->request->getPost('name');
        $school->insert($data);

        return redirect()->to('admin/schools');
    }

    public function update()
    {
        $school = new SChoolModel();

        $school->where('id', $this->request->getPost('id'))
              ->set(['name' => $this->request->getPost('name')])
              ->update();

        return redirect()->to('admin/schools');
    }
}