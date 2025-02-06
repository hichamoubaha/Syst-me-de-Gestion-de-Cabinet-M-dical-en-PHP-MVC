<?php

class UserController {
    private $userModel;
    private $patientModel;
    private $medecinModel;

    public function __construct() {
        $this->userModel = new User();
        $this->patientModel = new Patient();
        $this->medecinModel = new Medecin();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'role' => $_POST['role']
            ];

            $userId = $this->userModel->create($data);

            if ($userId) {
                if ($data['role'] === 'patient') {
                    $patientData = [
                        'user_id' => $userId,
                        'date_naissance' => $_POST['date_naissance'],
                        'telephone' => $_POST['telephone']
                    ];
                    $this->patientModel->create($patientData);
                } elseif ($data['role'] === 'medecin') {
                    $medecinData = [
                        'user_id' => $userId,
                        'specialite' => $_POST['specialite']
                    ];
                    $this->medecinModel->create($medecinData);
                }

                // Redirect to login page or show success message
                header('Location: /login');
                exit;
            } else {
                // Show error message
                $error = "Registration failed";
            }
        }

        // Load the registration view
        require_once 'app/views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->getByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                // Start session and set user data
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];

                // Redirect to dashboard
                header('Location: /dashboard');
                exit;
            } else {
                $error = "Invalid email or password";
            }
        }

        // Load the login view
        require_once 'app/views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /');
        exit;
    }
}

