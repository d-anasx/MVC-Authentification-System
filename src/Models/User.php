<?php
namespace App\Models;

abstract class User {
    protected $id;
    protected $name;
    protected $email;
    protected $role;

    public function __construct($id, $name, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    
    }

    abstract public function setRole($role);
}
