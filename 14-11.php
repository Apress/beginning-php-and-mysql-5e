<?php
    $length = 12;
    $valid = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $max = strlen($valid);
    $db = new mysqli("localhost", "webuser", "secret", "chapter14");

    // Create a pseudorandom password $length characters in length
    for ($i = 0; $i < $length; ++$i) {
        $pswd .= $valid[random_int(0, $max)];
    }

    // User's hash value
    $id = filter_var($_GET[id], FILTER_SANITIZE_STRING);

    // Update the user table with the new password
    $stmt = $db->prepare("UPDATE logins SET pswd=? WHERE hash=?");
    $stmt->bind_param("ss", password_hash($pswd, PASSWORD_DEFAULT), $id);
    $stmt->execute();

    // Display the new password
    echo "<p>Your password has been reset to {$pswd}.</p>";
?>
