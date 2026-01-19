<?php
namespace App\Models;

class Admin extends User {

    public function __construct($id, $name, $email) {
        parent::__construct($id, $name, $email);
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function __get($name)
    {
        return $this->$name;
    }
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}
