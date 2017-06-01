<?php 
header('content-type: text/html; charset=iso-8859-9');
header('content-type: text/html; charset=windows-1254');

?><?php



//--------------------------------

// ------------------ FONKSIYONLAR

//--------------------------------

/*

function kod($uzunluk)

{

  $karakterler = array();

  $karakterler = array_merge(range(0,9),range('a','z'),range('A','Z'));

  srand((float)microtime()*100000);

  shuffle($karakterler);

  $sonuc = '';

  for($i=0; $i<$uzunluk; $i++)

  {

    $sonuc .= $karakterler[$i];

  }

  unset($karakterler);

  return ($sonuc);

}



$guvenlikkodu = kod(5);



*/



// Database Ayarlari



$db_kullanici = "bedenegi_haber";

$db_sifre = "8A1ptCwO";

$db_adi = "bedenegi_haber";




@mysql_connect("localhost","$db_kullanici","$db_sifre");

@mysql_select_db("$db_adi");



// -------------------------------------------------------------------



// Dizin Ayarlari



$uploaddir = "/home/bedenegi/public_html/images_up/";

$site = "http://".$_SERVER['HTTP_HOST'];

//-------------------------------------------------------------





//--------------------------------

// --------------META TAG AYARLARI

//--------------------------------

require_once("baglan.php");

$ayarSQL = mysql_query("SELECT * FROM ayarlar ORDER BY id DESC LIMIT 1");

$ayarVeri = mysql_fetch_array($ayarSQL);

$title = $ayarVeri["title"];

$description = $ayarVeri["description"];

$keywords = $ayarVeri["keywords"];

$copy = $ayarVeri["copy"];

$author = "";

$copyright = "";

?>
