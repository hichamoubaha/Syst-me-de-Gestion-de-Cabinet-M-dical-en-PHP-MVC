<?php

class RendezVous {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($data) {
        $query = "INSERT INTO rendez_vous (patient_id, medecin_id, date_heure, statut) VALUES (:patient_id, :medecin_id, :date_heure, :statut)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':patient_id' => $data['patient_id'],
            ':medecin_id' => $data['medecin_id'],
            ':date_heure' => $data['date_heure'],
            ':statut' => $data['statut']
        ]);
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

    public function updateStatus($id, $status) {
        $query = "UPDATE rendez_vous SET statut = :statut WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id, ':statut' => $status]);
    }

    // Add more methods as needed (update, delete, get by doctor, etc.)
}

