<?php
class logService {
    private function authenticate() {
        if (empty($_GET['AppId']) || empty($_GET['Timestamp']) || empty($_GET['Signature'])) {
            return false;
        }
        else {
            $Secret = null;
            // Replace with a lookup of the secret based on the AppId.
            if ($_GET['AppId'] == 'MyApplication') {
                $Secret = '1234567890';
            }
            If ($Secret) {
                $params = "AppId={$_GET['AppId']}&Timestamp={$_GET['Timestamp']}";
                $Signature = base64_encode(hash_hmac("sha256", $params, $Secret, true));
                If ($Signature == $_GET['Signature']) {
                    return $_GET['AppId'];
                }
                else {
                    return false;
                }
            }
        }
    }

    public function addEvent() {
        if ($filename = $this->authenticate()) {
            $entry = gmdate('Y/m/d H:i:s') . ' ' . $_SERVER['REMOTE_ADDR'] . ' ' . $_GET['Msg'];
            file_put_contents('/log/' . $filename .'.log', $entry . "\n", FILE_APPEND);
            header('Content-Type: application/json');
            echo json_encode(true);
        }
        else {
            header('Content-Type: application/problem+json');
            echo json_encode(false);
        }
    }

    public function getEvents() {
        if ($filename = $this->authenticate()) {
        header('Content-Type: text/plain');
        readfile('/log/' . $filename .'.log');
    }
    else {
        header('Content-Type: application/problem+json');
        echo json_encode(false);
    }
}
};
