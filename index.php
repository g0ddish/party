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

function loadPictures($session, $attendee){
    $requestpic = new FacebookRequest(
        $session,
        'GET',
        '/'. $attendee->id .'/picture?redirect=false'
    );
    $responsepic = $requestpic->execute();
    $graphObjectpic = $responsepic->getGraphObject();
    echo "<img src ='" . $graphObjectpic->asArray()['url'] . "' />'";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convocation Party</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background: #0065A4; color: #ffffff;">
<div class="container text-center">
    <div class="container-fluid">
        <div class="row">
            <h1>T127 grad party, here is who's attending.</h1>
            <?php foreach($graphObject->asArray()['data'] as $attendee): ?>

                <div class="col-md-3">
                    <p><?php echo $attendee->name; ?></p>
                    <?php
                    loadPictures($session, $attendee);
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <h2>Vote on where we should hold the event.</h2>
            <div id="qp_all315374" style="width:100%;">
                <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'
                      type='text/css'><style>
                    #qp_main315374 .qp_btna:hover input {background:#002644!important}
                </style>

                <div id="qp_main315374" style=
                "border-radius:0px;margin:0px;padding:15px;background-color:#006dc5;font-family:'Open Sans', sans-serif,Arial;color:#000;border:1px solid #004379;max-width: \800px">
                    <div style=
                         "font-size:18px;background-color:#004379;color:#FFF;font-family:'Open Sans', sans-serif, Arial">
                        <div style="line-height:30px;padding:10px 15px">
                            Where should we party?
                        </div>
                    </div>

                    <form action="//www.poll-maker.com/results315374xc4874A35-12" id=
                    "qp_form315374" method="post" name="qp_form315374" style=
                          "display:inline;margin:0px;padding:0px" target="_blank">
                        <div style="padding:0px">
                            <input name="qp_d315374" type="hidden" value=
                            "42142.0096875290-42142.0096859349">

                            <div class="qp_a" onclick=
                            "var c=this.getElementsByTagName('INPUT')[0]; if((!event.target?event.srcElement:event.target).tagName!='INPUT'){c.checked=(c.type=='radio'?true:!c.checked)};var i=this.parentNode.parentNode.parentNode.getElementsByTagName('INPUT');for(var k=0;k&lt;i.length;k++){i[k].parentNode.parentNode.setAttribute('sel',i[k].checked?1:0)}"
                                 style=
                                 "display:block;color:#FFF;background-color:#008dff;font-family: 'Open Sans', sans-serif, Arial;font-size:16px;line-height:1.5;padding:10px;margin:10px 0px;clear:both;border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px;-o-border-radius:6px;-ms-border-radius:6px">
                <span style="display:block;padding-left:30px;cursor:inherit">
                    <input name="qp_v315374" style=
                    "float: left;width: 20px;margin-left: -25px;margin-top: 2px;padding: 0px;height: 20px"
                           type="radio" value="1">A club. ex Comfort Zone</span>
                            </div>

                            <div class="qp_a" onclick=
                            "var c=this.getElementsByTagName('INPUT')[0]; if((!event.target?event.srcElement:event.target).tagName!='INPUT'){c.checked=(c.type=='radio'?true:!c.checked)};var i=this.parentNode.parentNode.parentNode.getElementsByTagName('INPUT');for(var k=0;k&lt;i.length;k++){i[k].parentNode.parentNode.setAttribute('sel',i[k].checked?1:0)}"
                                 style=
                                 "display:block;color:#FFF;background-color:#008dff;font-family: 'Open Sans', sans-serif, Arial;font-size:16px;line-height:1.5;padding:10px;margin:10px 0px;clear:both;border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px;-o-border-radius:6px;-ms-border-radius:6px">
                <span style="display:block;padding-left:30px;cursor:inherit">
                    <input name="qp_v315374" style=
                    "float: left;width: 20px;margin-left: -25px;margin-top: 2px;padding: 0px;height: 20px"
                           type="radio" value="2">A beach. ex Balmy</span>
                            </div>

                            <div class="qp_a" onclick=
                            "var c=this.getElementsByTagName('INPUT')[0]; if((!event.target?event.srcElement:event.target).tagName!='INPUT'){c.checked=(c.type=='radio'?true:!c.checked)};var i=this.parentNode.parentNode.parentNode.getElementsByTagName('INPUT');for(var k=0;k&lt;i.length;k++){i[k].parentNode.parentNode.setAttribute('sel',i[k].checked?1:0)}"
                                 style=
                                 "display:block;color:#FFF;background-color:#008dff;font-family: 'Open Sans', sans-serif, Arial;font-size:16px;line-height:1.5;padding:10px;margin:10px 0px;clear:both;border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px;-o-border-radius:6px;-ms-border-radius:6px">
                <span style="display:block;padding-left:30px;cursor:inherit">
                    <input name="qp_v315374" style=
                    "float: left;width: 20px;margin-left: -25px;margin-top: 2px;padding: 0px;height: 20px"
                           type="radio" value="999">Other</span>
                            </div>

                            <div id="qp_ot315374" style=
                            "display:block;color:#FFF;background-color:#008dff;font-family: 'Open Sans', sans-serif, Arial;font-size:16px;line-height:1.5;padding:10px;margin:10px 0px;clear:both;border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px;-o-border-radius:6px;-ms-border-radius:6px">
                                <div style="padding-left:33px">
                                    Please Specify: <input name='qp_other315374' style=
                                    "width:120px;position:relative;top:2px" type="text"
                                                           value=''>
                                </div>
                            </div>
                        </div>

                        <div style="padding-left:0px;height:40px;clear:both">
                            <a class="qp_btna" href="#" style=
                            "float:left;width:50%;max-width:140px;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;-o-box-sizing:border-box;padding-right:5px;text-decoration:none">
                                <input name="qp_b315374" style=
                                "width:100%;height:40px;background-color:#004379;font-family: 'Open Sans', sans-serif, Arial;font-size:16px;color:#FFF;cursor:pointer;cursor:hand;border:0px;-webkit-appearance:none;border-radius:0px"
                                       type="submit" value="Vote"></a><a class="qp_btna" href="#"
                                                                         style=
                                                                         "float:left;width:50%;max-width:140px;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;-o-box-sizing:border-box;padding-left:5px;text-decoration:none"><input name="qp_b315374"
                                                                                                                                                                                                                                                                                               style=
                                                                                                                                                                                                                                                                                               "width:100%;height:40px;background-color:#004379;font-family: 'Open Sans', sans-serif, Arial;font-size:16px;color:#FFF;cursor:pointer;cursor:hand;border:0px;-webkit-appearance:none;border-radius:0px"
                                                                                                                                                                                                                                                                                               type="submit" value="Results"></a>
                        </div><a href="http://www.poll-maker.com" id="qp_a315374" style=
                        "float:right;font-family:Arial;font-size:10px;color:rgb(0,0,0);text-decoration:none;display:none">Poll
                            Maker</a>
                    </form>

                    <div style="display:none">
                        <div id="qp_rp315374" style=
                        "font-size:11px;width:5ex;text-align:right;overflow:hidden;position:absolute;right:5px;height:1.5em;line-height:1.5em">
                        </div>

                        <div id="qp_rv315374" style=
                        "font-size:11px;width:0%;line-height:1.5em;text-align:right;color:#FFF;box-sizing:border-box;padding-right:3px">
                        </div>

                        <div id="qp_rb315374" style=
                        "font-size:12px;color:rgb(255,255,255);display:block;font-size:12px;padding-right:10px 5px">
                        </div>

                        <div id="qp_rva315374" style=
                        "background:#006FB9;border-color:#006FB9"></div>

                        <div id="qp_rvb315374" style=
                        "background:#163463;border-color:#163463"></div>

                        <div id="qp_rvc315374" style=
                        "background:#5BCFFC;border-color:#1481AB"></div>
                    </div>
                </div>
            </div><script language="javascript" src=
            "//scripts.poll-maker.com/3012/scpolls.js"></script>        </div>

    </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
