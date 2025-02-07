<?php

class Appointment {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($data) {
        $query = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, status) VALUES (:patient_id, :doctor_id, :appointment_date, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':patient_id' => $data['patient_id'],
            ':doctor_id' => $data['doctor_id'],
            ':appointment_date' => $data['appointment_date'],
            ':status' => $data['status']
        ]);
        return $this->db->lastInsertId();
    }

    public function getByPatientId($patientId) {
        $query = "SELECT * FROM appointments WHERE patient_id = :patient_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':patient_id' => $patientId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}

