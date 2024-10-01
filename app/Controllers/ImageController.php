<?php

namespace App\Controllers;

use App\Models\PatientModel;
use App\Models\ImageModel;

class ImageController extends BaseController
{
    public function index()
    {
        // Your logic to list images
    }

    public function addPatientToImages()
    {
        $patientModel = new PatientModel();

        // Fetch all patients for the selection
        $patients = $patientModel->findAll();

        return view('add_patient_to_images', ['patients' => $patients]);
    }

    public function savePatientToImages()
    {
        $patientModel = new PatientModel();
        $imageModel = new ImageModel();

        // Get the patient ID from the request
        $patient_id = $this->request->getPost('patient_id');

        // Fetch the patient details
        $patient = $patientModel->find($patient_id);
        if (!$patient) {
            return redirect()->back()->with('error', 'Patient not found');
        }

        // Prepare data to insert into images table
        $data = [
            'patient_id' => $patient['id'],
            'doctor_id' => $patient['doctor_id'],
            'upload_date' => date('Y-m-d H:i:s'),
            'radiologist_id' => session()->get('user_id'),
            'image_path' => '', // Set this when an image is uploaded
        ];

        // Save to images table
        if ($imageModel->save($data)) {
            return redirect()->to('/radiologer')->with('message', 'Patient added to images successfully.');
        }

        return redirect()->back()->with('error', 'Failed to add patient to images.');
    }
}
