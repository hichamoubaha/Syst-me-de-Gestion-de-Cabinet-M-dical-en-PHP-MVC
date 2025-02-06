<?php

class RendezVousController {
    private $rendezVousModel;
    private $medecinModel;
    private $patientModel;

    public function __construct() {
        $this->rendezVousModel = new RendezVous();
        $this->medecinModel = new Medecin();
        $this->patientModel = new Patient();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $patientId = $this->patientModel->getByUserId($_SESSION['user_id'])['id'];
            $data = [
                'patient_id' => $patientId,
                'medecin_id' => $_POST['medecin_id'],
                'date_heure' => $_POST['date_heure'],
                'statut' => 'en attente'
            ];

            if ($this->rendezVousModel->create($data)) {
                // Redirect to rendez-vous list or show success message
                header('Location: /rendez-vous');
                exit;
            } else {
                // Show error message
                $error = "Failed to create rendez-vous";
            }
        }

        $medecins = $this->medecinModel->getAll();
        // Load the create rendez-vous view
        require_once 'app/views/create_rendez_vous.php';
    }

    public function list() {
        $patientId = $this->patientModel->getByUserId($_SESSION['user_id'])['id'];
        $rendezVous = $this->rendezVousModel->getByPatientId($patientId);

        // Load the rendez-vous list view
        require_once 'app/views/rendez_vous_list.php';
    }

    // Add more methods as needed (update, cancel, etc.)
}

