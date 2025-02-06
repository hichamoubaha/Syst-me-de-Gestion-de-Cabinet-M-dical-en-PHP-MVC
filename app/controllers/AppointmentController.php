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
                // Redirect to appointments list or show success message
                header('Location: /appointments');
                exit;
            } else {
                // Show error message
                $error = "Failed to create appointment";
            }
        }

        // Load the create appointment view
        require_once 'app/views/create_appointment.php';
    }

    public function list() {
        $patientId = $_SESSION['user_id']; // Assuming the patient is logged in
        $appointments = $this->appointmentModel->getByPatientId($patientId);

        // Load the appointments list view
        require_once 'app/views/appointments_list.php';
    }

    
}

