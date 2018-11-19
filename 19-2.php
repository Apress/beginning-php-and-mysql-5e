<?php
include "./aes.inc";

$aes = new AES('My Secret Key');

$e = $aes->encrypt("This message is secure and must be encrypted");
echo "Encrypted: '$e'\n";

$d = $aes->decrypt($e);
echo "Decrypted: '$d'\n";
