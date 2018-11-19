<?php

$query = "UPDATE products SET title='Painful Aftershave' WHERE sku='ZP457321'";
// Be aware of SQL injections when building query strings
$affected = $dbh->exec($query);
echo "Total rows affected: $affected";

?>
