<?php

class PatientController {
    private $patientModel;
    private $rendezVousModel;

    public function __construct() {
        $this->patientModel = new Patient();
        $this->rendezVousModel = new RendezVous();
    }

    public function dashboard() {
        $patient = $this->patientModel->getByUserId($_SESSION['user_id']);
        $rendezVous = $this->rendezVousModel->getByPatientId($patient['id']);

        require_once 'app/views/patient/dashboard.php';
    }

    // Add more patient-specific methods here
}

