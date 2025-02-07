<?php

class Medecin {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($data) {
        $query = "INSERT INTO medecins (user_id, specialite) VALUES (:user_id, :specialite)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':user_id' => $data['user_id'],
            ':specialite' => $data['specialite']
        ]);
        return $this->db->lastInsertId();
    }

    public function getByUserId($userId) {
        $query = "SELECT * FROM medecins WHERE user_id = :user_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $query = "SELECT m.*, u.first_name, u.last_name FROM medecins m JOIN users u ON m.user_id = u.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}

