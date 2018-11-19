<?php
    // Connect to the database server
    $dbh = new PDO('mysql:host=localhost;dbname=chp28', 'webuser', 'secret');

    // Create and prepare the query
    $query = "INSERT INTO products SET sku = :sku, title = :title";
    $stmt = $dbh->prepare($query);

    // Execute the query
    $stmt->execute( [':sku' => 'MN873213', ':title' => 'Minty Mouthwash'] );

    // Execute again
    $stmt->execute( [':sku' => 'AB223234', ':title' => 'Lovable Lipstick'] );
?>
