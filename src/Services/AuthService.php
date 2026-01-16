<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

class AuthService
{
    private UserRepository $userRepo;
    private RoleRepository $roleRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
        $this->roleRepo = new RoleRepository();

    }

    public function login(string $email, string $password)
    {
        $userFound = $this->userRepo->find('email', $email);

        if (!$userFound) {
            return null;
        }

        if (!password_verify($password, $userFound['password'])) {
            return null;
        }

        $role = $this->roleRepo->find('id' , $userFound['role_id']);
        $roleEntity = "App\Models\\" .ucfirst($role['title']);

        if (!class_exists($roleEntity)) {
            throw new \RuntimeException("Role class not found: {$roleEntity}");
        }

        $obj = new $roleEntity(
            $userFound['name'],
            $userFound['email'],
            $userFound['password']
        );
        
        $obj->setRole($role['title']);

        return $obj;
    }
    public function register($obj){
          $userFound = $this->userRepo->find('email', $obj->email);
          if($userFound){
             return false;
          }
          $passwordHash = password_hash($obj->password , PASSWORD_DEFAULT);

          $role_id = 0;

          switch($obj->role){
            case 'admin':
                $role_id = 1;
                break;
            case 'company':
                $role_id = 2;
                break;
            case 'candidate':
                $role_id = 3;
                break;
          };

          $data = ['name' => $obj->name , 'email' => $obj->email , 'password' => $passwordHash , 'role_id' => $role_id];
          
          $lastId = $this->userRepo->create($data);
          $obj->id($lastId);
          return $obj; 
    }
}
