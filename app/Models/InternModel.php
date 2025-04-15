<?php

namespace App\Models;

use CodeIgniter\Model;

class InternModel extends Model
{
    protected $table = 'interns';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 'email', 'pw', 'contact', 'img', 'name', 'school_id', 'course', 
        'req_hrs', 'department', 'start_date', 'end_date','is_active'
    ];

    public function uploadIMG($file)
    {
        $validMimeTypes = ['image/jpeg', 'image/png'];

        if (!in_array($file->getMimeType(), $validMimeTypes)) {
            return false;
        }

        if ($file->isValid() && !$file->hasMoved()) {
            $file_name = $file->getRandomName();

            $file->move(FCPATH . 'uploads', $file_name);
            return $file_name;

        } else {
            return false;
        }
    }

    public function getLedgerDetails()
    {
        $db = \Config\Database::connect();
    
        $builder = $db->table($this->table);
        $builder->select("interns.id as id, interns.name as name, schools.name as school, interns.start_date as start_date, interns.req_hrs as total_hours, ROUND(SUM(TIME_TO_SEC(TIMEDIFF(dtr.time_out, dtr.time_in))) / 3600, 2) AS rendered_hours, department, is_active");
        $builder->join('schools', 'interns.school_id = schools.id');
        $builder->join('dtr', 'interns.id = dtr.user_id')->orderBy('is_active', 'DESC');
    
        $query = $builder->get();
        return $query->getResultArray();
    }
}