<p>
Search the employee database:<br />
<form action="search.php" method="post">
   Last name:<br>
   <input type="text" name="lastname" size="20" maxlength="40" value=""><br>
   <input type="submit" value="Search!">
</form>
</p>

<?php

   // If the form has been submitted with a supplied last name
   if (isset($_POST['lastname'])) {

      // Connect to server and select database

      $db = new mysqli("localhost", "websiteuser", "secret", "chapter36");

      // Query the employees table
      $stmt = $db->prepare("SELECT firstname, lastname, email FROM employees
                            WHERE lastname like ?");

      $stmt->bind_param('s', $_POST['lastname']);

      $stmt->execute();

      $stmt->store_result();

      // If records found, output them
      if ($stmt->num_rows > 0) {

        $stmt->bind_result($firstName, $lastName, $email);

        while ($stmt->fetch())
          printf("%s, %s (%s)<br />", $lastName, $firstName, $email);
      } else {
         echo "No results found.";
      }

   }
?>
