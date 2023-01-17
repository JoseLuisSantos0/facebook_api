<?php
require 'fb.php';

$_SESSION['FBRLH_state']=$_GET['state']; 
$_SESSION['fb_access_token'] = (string) $accessToken; 

try 
{
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) 
{
    echo 'Deu erro no Graph: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) 
{
    echo 'Deu erro no SDK: ' . $e->getMessage();
    exit;
}

if (! isset($accessToken)) 
{
    if ($helper->getError()) 
    {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else 
    {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
}

// Dados do Access Token:
//var_dump($accessToken->getValue());

try {
    $response = $fb->get('/me?fields=name,email,picture,birthday', $accessToken->getValue());

    if(!empty($response)) 
    {
        $me = json_decode($response->getBody());

        $_SESSION['dados'] = $me;

        echo"<script>location.href='http://localhost:8000/dados.php';</script>";
        exit();
    }
    
} catch(\Facebook\Exceptions\FacebookResponseException $e) 
{
    echo 'Deu erro no Graph: ' . $e->getMessage();
    exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) 
{
    echo 'Deu erro no SDK: ' . $e->getMessage();
    exit;
}