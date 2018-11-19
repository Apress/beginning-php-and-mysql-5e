<?php
//
class AES {
    private $key = null;
    private $cipher = "AES-128-CBC";

    function __construct($key, $cipher = "AES-128-CBC") {
        $this->key = $key;
        $this->cipher = $cipher;
    }

    function encrypt($data) {
        if (in_array($this->cipher, openssl_get_cipher_methods())) {
            $ivlen = openssl_cipher_iv_length($this->cipher);
            $iv = openssl_random_pseudo_bytes($ivlen);
            $encrypted = openssl_encrypt($data, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
            $hmac = hash_hmac('sha256', $encrypted, $this->key, true);
            return base64_encode($iv.$hmac.$encrypted);
        }
        else {
            return null;
        }
    }

    function decrypt($data) {
        $c = base64_decode($data);
        $ivlen = openssl_cipher_iv_length($this->cipher);
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $encrypted = substr($c, $ivlen+$sha2len);
        $hmac_check = hash_hmac('sha256', $encrypted, $this->key, true);
        if (hash_equals($hmac, $hmac_check)) {
            return openssl_decrypt($encrypted, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        }
        else {
            return null;
        }
    }
}
