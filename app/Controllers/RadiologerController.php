<?php

namespace App\Controllers;

use App\Models\PatientsModel;
use App\Models\ImageModel;
use CodeIgniter\Controller;

class RadiologerController extends Controller
{
    protected $patientsModel;
    protected $imagesModel;

    public function __construct()
    {
        $this->patientsModel = new PatientsModel();
        $this->imagesModel = new ImageModel();
    }

    public function index()
    {
        $patients = $this->patientsModel->findAll();
        $radiologistId = session()->get('user_id');
        $images = $this->imagesModel->where('radiologist_id', $radiologistId)->findAll();

        return view('radiologer/index', ['patients' => $patients, 'images' => $images]);
    }
}
