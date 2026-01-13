<?php

class Role {
    private $title;

    public function __construct($title) {
        $this->title = $title;
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
