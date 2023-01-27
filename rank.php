<?php

require __DIR__ . '/class/RatingPics.php';

$rp = new RatingPics('pics/');
$rp->readScores();

if (isset($_GET['delete'])) {
    @unlink(__DIR__ . '/' . $rp->dir . $_GET['delete']);
    unset($rp->scores[$_GET['delete']]);
    $rp->writeScores();
    header('Location: rank.php#end');
}

$i = 1;
$html = '';
foreach ($rp->scores as $pic => $score) {
    $html .='<div style="background-image:url(\'' . $rp->dir . $pic . '\')">
        <a href="?delete=' . $pic . '" class="inside">🗑️</a>
        <span class="inside">#' . $i . '</span>
    </div>';
    $i++;
}

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>🥇 Ranking (<?=count($rp->scores)?>) 🥇</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div id="rank"><?=$html?></div>
    <div id="end"></div>
</body>

</html>