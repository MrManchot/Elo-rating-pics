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
    <title>⚔️ Rank ⚔️</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        $(document).ready(function() {
            $('body').keydown(function(e) {
                if (e.keyCode == 37) {
                    window.location = $('a:first-child').attr('href');
                } else if (e.keyCode == 39) {
                    window.location = $('a:last-child').attr('href');
                }
            });
        });
    </script>
</head>

<body>
    <div id="rate">
        <a href="?win=<?= base64_encode($pics[0]) ?>&loose=<?= base64_encode($pics[1]) ?>" style="background-image:url('<?= $pics[0] ?>');"></a>
        <a href="?win=<?= base64_encode($pics[1]) ?>&loose=<?= base64_encode($pics[0]) ?>" style="background-image:url('<?= $pics[1] ?>');"></a>
    </div>
</body>

</html>