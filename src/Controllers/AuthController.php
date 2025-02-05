<?php
namespace App\Controllers;

use App\Models\User;

class AuthController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function loginForm()
    {
        $this->render('auth/login');
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $this->redirect('/');
        } else {
            $this->render('auth/login', ['error' => 'Invalid credentials']);
        }
    }

    public function registerForm()
    {
        $this->render('auth/register');
    }

    public function register()
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'role' => 'patient' // Default role
        ];

        $userId = $this->userModel->create($data);

        if ($userId) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_role'] = 'patient';
            $this->redirect('/');
        } else {
            $this->render('auth/register', ['error' => 'Registration failed']);
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/login');
    }
}

