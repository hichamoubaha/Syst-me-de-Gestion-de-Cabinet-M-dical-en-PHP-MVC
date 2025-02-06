<?php

class Patient {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($data) {
        $query = "INSERT INTO patients (user_id, date_naissance, telephone) VALUES (:user_id, :date_naissance, :telephone)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':user_id' => $data['user_id'],
            ':date_naissance' => $data['date_naissance'],
            ':telephone' => $data['telephone']
        ]);
        return $this->db->lastInsertId();
    }

    public function getByUserId($userId) {
        $query = "SELECT * FROM patients WHERE user_id = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Add more methods as needed (update, delete, etc.)
}

