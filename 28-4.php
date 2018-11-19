<?php

$dbh = new PDO('mysql:host=localhost;dbname=chp28', 'webuser', 'secret');
echo $dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS);

?>
