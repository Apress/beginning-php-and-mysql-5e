<?php

class Employee
{

    private $name;
    private $title;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function sayHello() {
        echo "Hi, my name is {$this->getName()}.";
    }

}

