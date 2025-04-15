<?php

namespace App\Models;

use CodeIgniter\Model;

class DTRModel extends Model
{
    protected $table = 'dtr';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'date', 'time_in', 'time_out', 'task', 'last_updated_by'
    ];

    public function getTimelogs()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table($this->table);
        $builder->select('dtr.id as id, interns.name as name, date, time_in, time_out, task, interns.is_active as is_active, users.name as editor');
        $builder->join('interns', 'dtr.user_id = interns.id');
        $builder->join('users', 'dtr.last_updated_by = users.id', 'left');
        $builder->orderBy('interns.is_active', 'desc');
        $query = $builder->orderBy('id', 'desc')->get()->getResultArray();

        return $query;
    }

    public function getAccumulatedHours()
    {
        $db = \Config\Database::connect();
    
        $builder = $db->table($this->table);
        $builder->select("interns.name as name, DATE_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(time_out, time_in)))), '%H:%i') AS hours");
        $builder->join('interns', 'dtr.user_id = interns.id');
        $builder->where("dtr.time_in IS NOT NULL");
        $builder->where("dtr.time_out IS NOT NULL");
        $builder->groupBy('interns.id')->orderBy('interns.is_active', 'desc');
    
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getMyAccumulatedHours()
    {
        $session = session();
        $db = \Config\Database::connect();
    
        $builder = $db->table($this->table);
        $builder->select("DATE_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(time_out, time_in)))), '%H:%i') AS hours");
        $builder->where("user_id", $session->intern_id);
    
        $query = $builder->get();
        return $query->getRowArray();
    }
}