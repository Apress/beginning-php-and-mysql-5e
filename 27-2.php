<?php

    // Create a new server connection
    $mysqli = new mysqli('localhost', 'catalog_user', 'secret', 'corporate');

    // Create query
    $query = 'SELECT sku, name, price FROM products ORDER BY sku';

    // Create a statement object
    $stmt = $mysqli->stmt_init();

    // Prepare the statement for execution
    $stmt->prepare($query);

    // Execute the statement
    $stmt->execute();

    // Bind the result parameters
    $stmt->bind_result($sku, $name, $price);

    // Cycle through the results and output the data

    while($stmt->fetch())
        printf("%s, %s, %s <br />", $sku, $name, $price);

    // Recuperate the statement resources
    $stmt->close();

    // Close the connection
    $mysqli->close();

?>
