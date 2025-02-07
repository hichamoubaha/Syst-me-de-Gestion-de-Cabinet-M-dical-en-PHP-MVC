<?php

class RendezVous {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($data) {
        $query = "INSERT INTO rendez_vous (patient_id, medecin_id, date_heure, statut) VALUES (:patient_id, :medecin_id, :date_heure, :statut)";
        $stmt = $this->db->prepare($query);
        $result = $stmt->execute([
            ':patient_id' => $data['patient_id'],
            ':medecin_id' => $data['medecin_id'],
            ':date_heure' => $data['date_heure'],
            ':statut' => $data['statut']
        ]);

        if (!$result) {
            throw new Exception("Failed to insert rendez-vous into database");
        }

        return $this->db->lastInsertId();
    }

    public function getByPatientId($patientId) {
        $query = "SELECT rv.*, m.specialite, u.first_name, u.last_name 
                  FROM rendez_vous rv 
                  JOIN medecins m ON rv.medecin_id = m.id 
                  JOIN users u ON m.user_id = u.id 
                  WHERE rv.patient_id = :patient_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':patient_id' => $patientId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByMedecinId($medecinId) {
        $query = "SELECT rv.*, p.user_id as patient_user_id, u.first_name, u.last_name 
                  FROM rendez_vous rv 
                  JOIN patients p ON rv.patient_id = p.id 
                  JOIN users u ON p.user_id = u.id 
                  WHERE rv.medecin_id = :medecin_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':medecin_id' => $medecinId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $status) {
        $query = "UPDATE rendez_vous SET statut = :statut WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id, ':statut' => $status]);
    }
}

