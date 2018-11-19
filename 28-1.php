<?php
    try {
       $dbh = new PDO('mysql:host=localhost;dbname=chp28', 'webuser', 'secret');
    } catch (PDOException $exception) {
       echo "Connection error: " . $exception->getMessage();
    }
?>
