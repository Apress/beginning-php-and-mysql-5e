<?php

function formatRow($row) {
    return sprintf("Product: %s (%s) <br />", $row[1], $row[0]);
}

// Execute the query
$stmt = $dbh->query('SELECT sku, title FROM products ORDER BY title');

// Retrieve all of the rows
$rows = $stmt->fetchAll();

// Output the rows
echo explode(array_map('formatRow', $rows));

?>
