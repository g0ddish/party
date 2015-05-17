<?php
/**
 * Created by PhpStorm.
 * User: Alex Hughes
 * Date: 5/17/2015
 * Time: 2:15 AM
 * Contributions:
 *
 * If you use these IDs without my permission your children will be infertile...
 * API v2.3
 */
require 'vendor/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;

FacebookSession::setDefaultApplication('1578563992412490', 'c8adcf94d049c6e42cb0a1a042424ba7');


// If you already have a valid access token:
//$session = new FacebookSession('access-token');

// If you're making app-level requests:
$session = FacebookSession::newAppSession();

// To validate the session:
try {
    $session->validate();
} catch (FacebookRequestException $ex) {
    // Session not valid, Graph API returned an exception with the reason.
    echo $ex->getMessage();
} catch (\Exception $ex) {
    // Graph API returned info, but it may mismatch the current app or have expired.
    echo $ex->getMessage();
}


$request = new FacebookRequest(
    $session,
    'GET',
    '/982672531766262/attending'
);
$response = $request->execute();
$graphObject = $response->getGraphObject();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Convocation Party</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <h1>Hello, world! We're having a party, here is whos attending.</h1>
    <div class="container-fluid">
    <pre>
    <?php print_r($graphObject); ?>
        </pre>
    </div>
    </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
