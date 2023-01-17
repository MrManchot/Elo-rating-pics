<?php

require __DIR__ . '/class/RatingPics.php';
require __DIR__ . '/class/Rating.php';

$rp = new RatingPics('pics/');
if (isset($_GET['win']) && isset($_GET['loose'])) {
    $rp->play($_GET['win'], $_GET['loose']);
    header('Location: index.php');
}
$pics = $rp->picKPics();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html {
            height: 100%;
        }
        body {
            height: 100%;
            margin: 0;
            text-align: center;
        }
        a {
            display: inline-block;
            width: 50%;
            min-height: 100%;
            background: no-repeat 50% 50%;
            background-size: contain;
            max-width:512px;
        }
    </style>
</head>
<body>
    <a href="?win=<?= base64_encode($pics[0]) ?>&loose=<?= base64_encode($pics[1]) ?>" style="background-image:url(<?= $pics[0] ?>);"></a>
    <a href="?win=<?= base64_encode($pics[1]) ?>&loose=<?= base64_encode($pics[0]) ?>" style="background-image:url(<?= $pics[1] ?>);"></a>
</body>
</html>