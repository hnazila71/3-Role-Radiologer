<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'date_of_birth', 'created_at', 'doctor_id'];

    public function getPatientsWithDoctor()
    {
        $builder = $this->builder();
        $builder->select('patients.id, patients.name, patients.date_of_birth, patients.created_at, users.email as doctor_name');
        $builder->join('users', 'patients.doctor_id = users.id', 'left');
        // $builder->getLastQuery()->getQuery();
        // $this->db->getLastQuery()->getQuery();
        // echo $db->getLastQuery();
        // echo $this->db->lastQuery();
        // echo $db->lastQuery();
        return $builder->get()->getResultArray();
    }
}
