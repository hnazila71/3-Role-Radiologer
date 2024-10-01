<?php

namespace App\Controllers;

use App\Models\PatientModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $session = session();
        $role = $session->get('role');
        $userId = $session->get('user_id');

        $data = [];

        switch ($role) {
            case 'dokter':
                return view('dokter'); // Adjust as needed

            case 'perawat':
                return view('perawat');

            case 'radiologer':
                $data['patients'] = $this->getPatientsForRadiologer();
                $data['doctors'] = $this->getDoctors();
                return view('radiologer', $data);

            default:
                return view('welcome_message');
        }
    }

    private function getPatientsForRadiologer()
    {
        $patientModel = new PatientModel();
        // Fetch patients with their associated doctors
        return $patientModel->getPatientsWithDoctor();
    }

    private function getDoctors()
    {
        $userModel = new UserModel();
        // Fetch doctors
        return $userModel->getDoctors();
    }
}
