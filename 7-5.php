<?php

class Employee {
 private $name;
 private $salary;

 function setName($name) {
   $this->name = $name;
 }

 function setSalary($salary) {
   $this->salary = $salary;
 }

 function getSalary() {
   return $this->salary;
 }
}

class Executive extends Employee {
 function pillageCompany() {
   $this->setSalary($this->getSalary() * 10);
 }
}

class CEO extends Executive {
  function getFacelift() {
     echo "nip nip tuck tuck\n";
  }
}

$ceo = new CEO();
$ceo->setName("Bernie");
$ceo->setSalary(100000);
$ceo->pillageCompany();
$ceo->getFacelift();
echo "Bernie's Salary is: {$ceo->getSalary()}\n"; 
?>

