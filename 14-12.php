<?php
include('fb_config.inc');

$fb = new \Facebook\Facebook([
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
    'default_graph_version' => 'v2.11',
]);

$helper = $fb->getJavaScriptHelper();

try {
    $accessToken = $helper->getAccessToken();
    $fb->setDefaultAccessToken((string) $accessToken);
    $response = $fb->get('/me?fields=id,name');
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    Error('Graph returned an error: ' . $e->getMessage());
    exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    Error('Facebook SDK returned an error: ' . $e->getMessage());
    exit;
}

$me = $response->getGraphUser();
// $me is an array with the id of the user and any additional fields requested.
