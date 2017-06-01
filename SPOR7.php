<?php
include('HaberBotu.php');
$trt = new Spor7Bot();
$trt->setSadeceyazicek(true);
$trt->setSonkachabercek(1);
$sonuc = $trt->calistir();
print_r($sonuc);
?>