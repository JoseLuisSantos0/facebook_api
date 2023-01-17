<?php

require_once '../vendor/autoload.php';

if(!session_id()) {
    session_start();
}

$fb = new \Facebook\Facebook([
    'app_id' => '{app-id}',
    'app_secret' => '{app-secret}',
    'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();