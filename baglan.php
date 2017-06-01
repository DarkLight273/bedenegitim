<?php 
header('content-type: text/html; charset=iso-8859-9');

?>
<?php




$db_kullanici = "bedenegi_haber";

$db_sifre = "8A1ptCwO";

$db_adi = "bedenegi_haber";




@mysql_connect("localhost","$db_kullanici","$db_sifre");

@mysql_select_db("$db_adi");

?>
