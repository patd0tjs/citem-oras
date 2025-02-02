<?php

namespace App\Controllers;
use App\Models\DTRModel;

class DTRController extends BaseController
{
    public function timelogsPage()
    {
        $dtr = new DTRModel();
        $timelogs = $dtr->getTimelogs();

        $data = [
            'page'     => 'Intern Timelogs',
            'timelogs' => $timelogs
        ];

        return view('admin/timelogs', $data);
    }

    public function accumulatedHoursPage()
    {
        $dtr = new DTRModel();
        $hours = $dtr->getAccumulatedHours();

        $data = [
            'page'  => 'Accumulated Hours',
            'hours' => $hours
        ];

        return view('admin/accumulated', $data);
    }
    
    public function updateTimelog()
    {
        $dtr = new DTRModel();

        $updates = [
            'time_in'  => $this->request->getPost('time_in'),
            'time_out' => $this->request->getPost('time_out')
        ];

        $dtr->where('id', $this->request->getPost('id'))
            ->set($updates)
            ->update();

        return redirect()->to('admin');
    }
}