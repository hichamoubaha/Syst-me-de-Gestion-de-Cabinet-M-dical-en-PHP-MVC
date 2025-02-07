<?php

class MedecinController {
    private $medecinModel;
    private $rendezVousModel;

    public function __construct() {
        $this->medecinModel = new Medecin();
        $this->rendezVousModel = new RendezVous();
    }

    public function dashboard() {
        $medecin = $this->medecinModel->getByUserId($_SESSION['user_id']);
        $rendezVous = $this->rendezVousModel->getByMedecinId($medecin['id']);

        require_once 'app/views/medecin/dashboard.php';
    }

    // Add more medecin-specific methods here
}

