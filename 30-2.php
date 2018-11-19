<?php

   // Connect to the MySQL database
   $mysqli = new mysqli("localhost", "websiteuser", "secret", "helpdesk");

   // Assign the POSTed values for convenience
   $options = array('min_range' => 0, 'max_range' => 1);
   $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
   $available = filter_var($_POST['available'], FILTER_VALIDATE_INT, $options);

   // Create the UPDATE query
   $stmt = $mysqli->prepare("UPDATE technicians SET available=? WHERE email=?");

   $stmt->bind_param('is', $available, $email);

   // Execute query and offer user output
   if ($stmt->execute()) {

      echo "<p>Thank you for updating your profile.</p>";

      if ($available == 0) {
         echo "<p>Your tickets will be reassigned to another technician.</p>";
      }

   } else {
      echo "<p>There was a problem updating your profile.</p>";
   }

?>
