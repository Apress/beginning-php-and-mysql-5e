<?php

    // Connect to the database server
    $dbh = new PDO("mysql:host=localhost;dbname=chp28", "webuser", "secret");

    // Execute the query
    $stmt = $dbh->query('SELECT sku, title FROM products ORDER BY title');

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        printf("Product: %s (%s) <br />", $row[‘title’], $row[‘sku’]);
    }

?>
