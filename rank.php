<?php

# Screenshot_20170516-223047.png

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/class/RatingPics.php';

$rp = new RatingPics('pics/');
if(isset($_GET['delete'])) {
    unlink(__DIR__ . '/' . $rp->dir . $_GET['delete']);
}

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
        body {
            text-align:center;
            margin: 0;
        }
        img {
            display: block;
            margin:0 auto;
            max-width: 100%;
            max-height: 800px;
            height: auto;
        }
    </style>
</head>
<body>
<?php
$i = 1;
foreach($rp->scores as $pic => $score) {
    echo '<h1>'.$i.' => '.round($score).'</h1>';
    echo '<a href="?delete='.$pic.'">DELETE</a>';
    echo '<img src="'.$rp->dir.$pic.'">';
    echo '<hr>';
    $i++;
}
?>
</body>
</html>