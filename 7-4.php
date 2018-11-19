<?php
   // Define a base Employee class
   class Employee {

      private $name;

      // Define a setter for the private $name property.
      function setName($name) {
         if ($name == "") echo "Name cannot be blank!";
         else $this->name = $name;
      }

      // Define a getter for the private $name property
      function getName() {
         return "My name is ".$this->name."<br />";
      }
   } // end Employee class

   // Define an Executive class that inherits from Employee
   class Executive extends Employee {

      // Define a method unique to Employee
      function pillageCompany() {
         echo "I'm selling company assets to finance my yacht!";
      }

   } // end Executive class

   // Create a new Executive object
   $exec = new Executive();

   // Call the setName() method, defined in the Employee class
   $exec->setName("Richard");

   // Call the getName() method
   echo $exec->getName();

   // Call the pillageCompany() method
   $exec->pillageCompany();
?>

