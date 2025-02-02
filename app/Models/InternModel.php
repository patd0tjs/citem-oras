<?php

namespace App\Models;

use CodeIgniter\Model;

class InternModel extends Model
{
    protected $table = 'interns';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 'email', 'pw', 'contact', 'img', 'name', 'school', 'course', 
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
}