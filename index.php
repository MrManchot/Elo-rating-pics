<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/class/RatingPics.php';

$rp = new RatingPics('pics/');
if (isset($_GET['win']) && isset($_GET['loose'])) {
    $rp->play($_GET['win'], $_GET['loose']);
}
$pics = $rp->picKPics();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html {
            height: 100%;
        }
        body {
            height: 100%;
            margin: 0;
        }
        a {
            display: block;
            width: 50%;
            float: left;
            min-height: 100%;
            background: no-repeat 50% 50%;
            background-size: contain;
        }
    </style>
</head>
<body>
    <a href="?win=<?= base64_encode($pics[0]) ?>&loose=<?= base64_encode($pics[1]) ?>" style="background-image:url(<?= $pics[0] ?>);"></a>
    <a href="?win=<?= base64_encode($pics[1]) ?>&loose=<?= base64_encode($pics[0]) ?>" style="background-image:url(<?= $pics[1] ?>);"></a>
</body>
</html>