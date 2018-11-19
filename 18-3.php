<?php

$url = "http://webservices.amazon.com/onca/xml";

$param = "AWSAccessKeyId=AKIAIOSFODNN7EXAMPLE&AssociateTag=mytag-20&ItemId=0679722769&Operation=ItemLookup&ResponseGroup=Images%2CItemAttributes%2COffers%2CReviews&Service=AWSECommerceService&Timestamp=2014-08-18T12%3A00%3A00Z&Version=2013-08-01";

$data = " GET
webservices.amazon.com
/onca/xml
" . $param;

$key = "1234567890";
$Signature = base64_encode(hash_hmac("sha256", $param, $key, true));

$request = $url . "?" . $param . "&Signature=" . $Signature;

echo $request;
