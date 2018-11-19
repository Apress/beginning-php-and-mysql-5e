<?php

$hash = '$2y$10$s.CM1KaHMF/ZcskgY6FRu.IMJMeoMgaG1VsV6qkMaiai/b8TQX7ES';
$passwords = ["secret", "guess"];

foreach ($passwords as $password) {
   if (password_verify($password, $hash)) {
      echo "Password is correct\n";
   }
   else {
      echo "Invalid Password\n";
   }
}

?>
