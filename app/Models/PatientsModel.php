<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientsModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'date_of_birth', 'created_at', 'doctor_id'];

    // Method to get patients by doctor ID
    public function getPatientsByDoctor($doctorId)
    {
        try {
            return $this->where('doctor_id', $doctorId)->findAll();
        } catch (\Exception $e) {
            log_message('error', 'Error fetching patients: ' . $e->getMessage());
            return [];
        }
    }

    // Method to delete multiple patients by their IDs
    public function deletePatients($patientIds)
    {
        try {
            if (!empty($patientIds)) {
                return $this->whereIn('id', $patientIds)->delete();
            }
            return false;
        } catch (\Exception $e) {
            log_message('error', 'Error deleting patients: ' . $e->getMessage());
            return false;
        }
    }
}
