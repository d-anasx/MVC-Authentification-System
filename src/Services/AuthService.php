<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class AuthService
{
    private UserRepository $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login(string $email, string $password): ?User
    {
        $userFound = $this->userRepo->find('email', $email);

        if (!$userFound) {
            return null;
        }

        if (!password_verify($password, $userFound['password'])) {
            return null;
        }

        $user = new User(
            $userFound['name'],
            $userFound['email'],
            $userFound['password']
        );

        $user->setRole($userFound['role_id']);

        return $user;
    }
}
