<?php

$query = 'SELECT sku, title FROM products ORDER BY id';
// Be aware of SQL injections when building query strings

foreach ($dbh->query($query) AS $row) {
    printf("Product: %s (%s) <br />", $row[‘title’], $row[‘sku’]);
}

?>
