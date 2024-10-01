<?php

namespace App\Controllers;

use App\Models\PatientsModel;
use CodeIgniter\Controller;

class DoctorDashboard extends Controller
{
    public function index()
    {
        $patientsModel = new PatientsModel();

        // Get the ID of the currently logged-in doctor
        $doctorId = session()->get('user_id');

        // Fetch patients for the logged-in doctor
        $patients = $patientsModel->getPatientsByDoctor($doctorId);

        // Debugging: Output the data
        echo "<pre>";
        print_r($patients); // This will print the patients data
        echo "</pre>";

        $data['patients'] = $patients;

        return view('doctor_dashboard', $data);
    }
}
