<?php
class Employee {
  private $name;
  function setName($name) {
    $this->name = $name;
  }
  function getName() {
    return $this->name;
  }
}

$emp1 = new Employee();
$emp1->setName('John Smith');
$emp2 = $emp1;
$emp2->setName('Jane Smith');

echo "Employee 1 = {$emp1->getName()}\n";
echo "Employee 2 = {$emp2->getName()}\n";

