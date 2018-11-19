<?php
$AppId = 'MyApplication';
$Secret = '1234567890';
$url = 'https://logservice.com/api/add_event.php';
$Timestamp = time();
$Msg = 'Testing of the logging Web Service';
$params = "AppId={$AppId}&Timestamp={$Timestamp}";
$Signature = base64_encode(hash_hmac("sha256", $params, $Secret, true));
$QueryString = $params . '&Msg=' . urlencode($Msg) . '&Signature=' . urlencode($Signature);
echo file_get_contents($url . '?' . $QueryString);
