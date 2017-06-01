<?php
include('HaberBotu.php');
$trt = new TRTSPORBOT();
$trt->setSadeceyazicek(false);
$trt->setSonkachabercek(1);
$sonuc = $trt->calistir();
print_r($sonuc);
?>