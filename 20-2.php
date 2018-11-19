<?php

 // A makeshift accounts repository
 $accounts = array("wjgilmore", "mwade", "twittermaniac");

 // Define an array which will store the status
 $result = array();

 // If the username has been set, determine if it exists in the repository
 if (isset($_GET['username']))
 {

 // Filter the username to make sure no funny business is occurring
 $username = filter_var($_GET['username'], FILTER_SANITIZE_STRING);

 // Does the username exist in the $accounts array?
 if (in_array($username, $accounts))
 {
 $result['status'] = "FALSE";
 } else {
 $result['status'] = "TRUE";
 }

 // JSON-encode the array
 echo json_encode($result);
 }
?>
