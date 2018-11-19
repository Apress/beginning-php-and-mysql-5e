<?php

    // Instantiate the mysqli class
    $db = new mysqli("localhost", "websiteuser", "jason", "corporate");

    // Assign the employeeID
    $eid = filter_var($_POST['employeeid'], FILTER_SANITIZE_NUMBER_INT);

    // Execute the stored procedure
    $stmt = $db->prepare("SELECT calculate_bonus(?) AS bonus");

    $stmt->bind_param('s', $eid);

    $stmt->execute();

    $stmt->bind_result($bonus);

    $stmt->fetch();

   printf("Your bonus is \$%01.2f",$bonus);
?>
