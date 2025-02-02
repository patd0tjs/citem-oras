<?php

namespace App\Controllers;
use App\Models\DTRModel;

// set timezone to manila
date_default_timezone_set('Asia/Manila');

class LoggerController extends BaseController
{
    public function index()
    {
        $session = session();
        $dtr = new DTRModel();

        $current_date = date('Y-m-d');
        $current_dtr = $dtr->where('date', $current_date)
                           ->where('user_id', $session->intern_id)
                           ->first();

        $current_dtr = (array) $current_dtr;
        
        return view('logger', ['dtr' => $current_dtr, 'intern_name' => $session->intern_name]);
    }

    public function clockIn()
    {
        $session = session();
        $dtr = new DTRModel();

        $data = [
            'user_id' => $session->intern_id,
            'date'    => date('Y-m-d'),
            'time_in' => date('H:i')
        ];

        $dtr->insert($data);

        return redirect()->to('/');
    }

    public function clockOut()
    {
        $session = session();
        $dtr = new DTRModel();

        $updates = [
            'time_out' => date('H:i'),
            'task'     => $this->request->getPost('task')
        ];

        $dtr->where('user_id', $session->intern_id)
            ->where('date', date('Y-m-d'))
            ->set($updates)
            ->update();

        return redirect()->to('/');

        echo $this->request->getPost('task');
    }
}
