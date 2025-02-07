<?php

class AppointmentController {
    private $appointmentModel;

    public function __construct() {
        $this->appointmentModel = new Appointment();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'patient_id' => $_SESSION['user_id'], // Assuming the patient is logged in
                'doctor_id' => $_POST['doctor_id'],
                'appointment_date' => $_POST['appointment_date'],
                'status' => 'pending'
            ];

            if ($this->appointmentModel->create($data)) {
                
                header('Location: /appointments');
                exit;
            } else {
                
                $error = "Failed to create appointment";
            }
        }

        
        require_once 'app/views/create_appointment.php';
    }

    public function list() {
        $patientId = $_SESSION['user_id']; 
        $appointments = $this->appointmentModel->getByPatientId($patientId);

        
        require_once 'app/views/appointments_list.php';
    }

    
}

