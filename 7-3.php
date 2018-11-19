<?php

// Create new Employee object
$employee1 = new Employee();

// Set the $employee1 employeeid property
$employee1->setEmployeeID("12345");

// Clone the $employee1 object
$employee2 = clone $employee1;

// Set the $employee2 employeeid property
$employee2->setEmployeeID("67890");

// Output the $employee1 and $employee2 employeeid properties
printf("Employee1 employeeID: %d <br />", $employee1->getEmployeeID());
printf("Employee1 tie color: %s <br />", $employee1->getTieColor());
printf("Employee2 employeeID: %d <br />", $employee2->getEmployeeID());
printf("Employee2 tie color: %s <br />", $ employee2->getTieColor());

