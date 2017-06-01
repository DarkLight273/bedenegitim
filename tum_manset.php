<?php 
header('content-type: text/html; charset=iso-8859-9');
include "ayarlar.php";
include "fonc.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><link rel="STYLESHEET" type="text/css" href="css/stil.css">
<meta name="description" content="<?=$description?>" />
<meta name="keywords" content="<?=$keywords?>" />
<meta name="robots" content="index, follow" />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-9" />
<title><?=$title?></title>
<!--<?php include "head.php"; ?>-->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7540595-1']);
  _gaq.push(['_setDomainName', 'bedenegitimi.gen.tr']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



</head>
<body>

<div><?php include "reklam5.html"; ?>
<?php include "sag_reklam_300.php"; ?></div>


<table width="802" border="0" cellspacing="0" cellpadding="0" class="anatablo">
  <tr>
    <td colspan="3" ><?php include "ust.php"; ?>  
   <?php include "manset_3.php"; ?>
</td>
   
  </tr>

  <tr>
    <td width="160" valign="top"><?php include "sol.php"; ?></td>
    <td valign="top">
	<!-- MANSET BASLANGIÇ -->
	<table width="468" align="center" border="0" cellspacing="0" cellpadding="0">
 
  <tr>
   <td background="images/bant_bg.jpg" height="24" style="padding-left:20px; "><font color="#FFFFFF" face="Tahoma"  style="font-size:14px; font-weight:bold; ">Günün Diğer Haber Başlıkları</font>

<br><?php
require_once ("baglan.php");
$strSQLkayan ="SELECT * FROM haberler WHERE gizle = '0' ORDER BY id DESC LIMIT 20 ";
$sorgukayan =  mysql_query($strSQLkayan);


while ($haberkayan=mysql_fetch_array ($sorgukayan)){
if ($haberkayan["resim"] == "") {
$haberkayan["resim"] = "haber_resim_yok.jpg"; }

$haberid_kayan =$haberkayan["id"];
$haberbaslik_kayan =$haberkayan["baslik"];
$habersaat_kayan =$haberkayan["saat"];
$haberkayan_kat =$haberkayan["kategori"];
$resim = $haberkayan["resim"];
$kati = mysql_query("SELECT * FROM haber_kat WHERE id = $haberkayan_kat");
$k = mysql_fetch_array($kati);
$kat = $k["kategori"];
	?>
  <tr>
   
<td>
  &nbsp;&nbsp;<img src="images/devami5.gif">&nbsp;<font color="#999999" style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:12px; ">&nbsp;<a href="<?=sil($kat)?>/<?=sil($haberbaslik_kayan)?>-<?=$haberid_kayan?>.htm"><?=$haberbaslik_kayan?></a></font>

</td>
</tr>

<tr>
<td width="468" style="padding-left:0px;">
          <a href="<?=sil($kat)?>/<?=sil($haberbaslik_kayan)?>-<?=$haberid_kayan?>.htm"><img src="images_up/<?=$resim?>" width="468" border="0" height="241" title="<?=$haberbaslik_kayan?>" /><br></td></a>
  </tr>


 
  <? } ?></td>
  </tr>



</td>
  </tr>
 </table>

	</td>
    <td width="160" valign="top" align="right"><?php include "sag.php"; ?></td>
  </tr>
   <?php 
mysql_close();
?>
  <tr>
    <td colspan="3"><table width="802" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="right"  bgcolor="#F7F7F7">
<center><?php include "alt.php"; ?></center>  
</td>
</tr>
  
</table>
</td>
    
  </tr>
</table>

</body>
</html>
