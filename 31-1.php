<?php

    // Connect to the MySQL database
    $mysqli = new mysqli("localhost", "websiteuser", "secret", "chapter34");

    // Create the query
    $query = "SELECT * FROM employee_contact_info_view";

    // Execute the query
    if ($result = $mysqli->query($query)) {

        printf("<table border='1'>");
        printf("<tr>");

        // Output the headers
        $fields = $result->fetch_fields();
        foreach ($fields as $field)
            printf("<th>%s</th>", $field->name);

        printf("</tr>");

        // Output the results
        while ($employee = $result->fetch_assoc()) {
            // Format the phone number
            $phone = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/",
                                  "(\\1) \\2-\\3", $employee['Telephone']);

            printf("<tr>");
            printf("<td>%s</td><td>%s</td>", $employee['First Name'], $employee['Last Name']);
            printf("<td>%s</td><td>%s</td>", $employee['Email Address'], $phone);
            printf("</tr>");

      }

   }
?>
