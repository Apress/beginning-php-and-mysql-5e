<?php
$AppId = 'MyApplication';
$Secret = '1234567890';
$url = 'https://logservice.com/api/get_events.php';
$Timestamp = time();
$params = "AppId={$AppId}&Timestamp={$Timestamp}";
$Signature = base64_encode(hash_hmac("sha256", $params, $Secret, true));
$QueryString = $params . '&Signature=' . urlencode($Signature);
echo file_get_contents($url . '?' . $QueryString);
