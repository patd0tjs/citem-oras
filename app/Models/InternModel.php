<?php

namespace App\Models;

use CodeIgniter\Model;

class InternModel extends Model
{
    protected $table = 'interns';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 'email', 'pw', 'img', 'name', 'school', 'course', 
        'req_hrs', 'department', 'start_date', 'end_date','is_active'
    ];
}