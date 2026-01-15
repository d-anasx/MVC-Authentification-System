
<?php

namespace App\Controllers;

use App\Services\AuthService;

class AuthController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        $errors = [];

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $errors[] = 'Email and password are required';
            $_SESSION['errors'] = $errors;
            header('Location: /login');
            exit;
        }

        $user = $this->authService->login($email, $password);

        if (!$user) {
            $errors[] = 'Invalid email or password';
            $_SESSION['errors'] = $errors;
            header('Location: /login');
            exit;
        }

        $_SESSION['user'] = [
            'id'   => $user->Id(),
            'name' => $user->Name(),
            'role' => $user->Role()
        ];

        switch ($user->getRole()) {
            case 'admin':
                header('Location: /admin/dashboard');
                break;

            case 'company':
                header('Location: /company/dashboard');
                break;

            default:
                header('Location: /');
        }

        exit;
    }
}
