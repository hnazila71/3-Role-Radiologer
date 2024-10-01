<?php

namespace App\Controllers;

use App\Models\PatientModel;
use App\Models\UserModel;
use App\Models\ImageModel; // Tambahkan model untuk images
use CodeIgniter\Controller;

class PatientController extends Controller
{
    public function dashboard()
    {
        $patientModel = new PatientModel();
        $doctorId = session()->get('user_id');

        try {
            // Ambil pasien yang terkait dengan dokter yang sedang login
            $data['patients'] = $patientModel->where('doctor_id', $doctorId)->findAll();
        } catch (\Exception $e) {
            log_message('error', 'Error fetching patients: ' . $e->getMessage());
            $data['patients'] = [];
        }

        return view('doctor_dashboard', $data);
    }

    public function create()
    {
        $patientModel = new PatientModel();
        // Get the existing patients
        $data['patients'] = $patientModel->findAll();

        return view('add_patient', $data);
    }

    public function save()
    {
        $patientModel = new PatientModel();
        $imagesModel = new ImageModel(); // Assuming you have an ImagesModel

        // Retrieve and validate form data
        $patientId = $this->request->getPost('patient_id');

        if (empty($patientId)) {
            return redirect()->back()->with('msg', 'Patient is required.')->withInput();
        }

        // Save to images table
        $imageData = [
            'patient_id' => $patientId,
            'doctor_id' => session()->get('user_id'), // Assuming you want to use the logged-in doctor ID
            'upload_date' => date('Y-m-d H:i:s'),
            'radiologist_id' => null,
            'image_path' => '' // Handle image upload as needed
        ];

        try {
            // Save the image data
            $imagesModel->save($imageData);
            return redirect()->to('/radiologer')->with('msg', 'Patient added successfully.');
        } catch (\Exception $e) {
            log_message('error', 'Error saving patient: ' . $e->getMessage());
            return redirect()->back()->with('msg', 'An error occurred while adding the patient.')->withInput();
        }
    }


    // Metode untuk menghapus pasien yang dipilih
    public function delete()
    {
        $patientModel = new PatientModel();

        // Ambil ID pasien yang dipilih dari formulir
        $patientIds = $this->request->getPost('patient_ids');

        if (!empty($patientIds)) {
            try {
                // Hapus pasien yang dipilih
                $patientModel->delete($patientIds);
                return redirect()->to('/radiologer')->with('msg', 'Selected patients deleted successfully.');
            } catch (\Exception $e) {
                log_message('error', 'Error deleting patients: ' . $e->getMessage());
                return redirect()->back()->with('msg', 'An error occurred while deleting patients.');
            }
        } else {
            return redirect()->back()->with('msg', 'No patients selected for deletion.');
        }
    }
}
