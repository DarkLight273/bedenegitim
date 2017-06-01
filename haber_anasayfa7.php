<?php 
header('content-type: text/html; charset=iso-8859-9');
?><?
$strSQL ="SELECT * FROM haberler WHERE gizle = '0' ORDER BY id DESC ";
$sorgu =  mysql_query($strSQL);

$i=0;
while ($haber=mysql_fetch_array ($sorgu)){

if ($haber["resim"] == "") {
$haber["resim"] = "haber_resim_yok.jpg"; }

if($haber["video"] == "1") {
$haber["video"] = "<img src='images/imgvideo.jpg'>";
} else {
$haber["video"] = "";
}

$haberid[$i] =$haber["id"];
$baslik[$i] =$haber["baslik"];
$kategori[$i] = $haber["kategori"];
$giris[$i] = $haber["giris"]; 
$video[$i] = $haber["video"];
$icerik[$i] = $haber["icerik"];
$resim[$i] = $haber["resim"];
$haber_tarih[$i] = $haber["tarih"];
$saat[$i] = $haber["saat"];
$kaynak[$i] = $haber["kaynak"]; 
$habkat = $kategori[$i];
//$haberkayan_kat = $haber["kategori"];
$kati = mysql_query("SELECT * FROM haber_kat WHERE id = '$habkat'");
$kativeri = mysql_fetch_array($kati);
$kategorim[$i] = $kativeri["kategori"];


if($video[$i] == "1") {
$videoson[$i] = "<img src='images/imgvideo.jpg'>";
}

$i++;
}
?>
<html>
<head></head>
<SCRIPT language=JavaScript>    
function showManset(divID)
    {
	//alert("aa");
	
    hide('manset0a');hide('manset0b');hide('manset0c');
    hide('manset1a');hide('manset1b');hide('manset1c');
    hide('manset2a');hide('manset2b');hide('manset2c');
    hide('manset3a');hide('manset3b');hide('manset3c');
    hide('manset4a');hide('manset4b');hide('manset4c');
    hide('manset5a');hide('manset5b');hide('manset5c');
    hide('manset6a');hide('manset6b');hide('manset6c');
    hide('manset7a');hide('manset7b');hide('manset7c');
    hide('manset8a');hide('manset8b');hide('manset8c');
	hide('manset9a');hide('manset9b');hide('manset9c');
	hide('manset10a');hide('manset10b');hide('manset10c');
	hide('manset11a');hide('manset11b');hide('manset11c');
	hide('manset12a');hide('manset12b');hide('manset12c');
	hide('manset13a');hide('manset13b');hide('manset13c');
	hide('manset14a');hide('manset14b');hide('manset14c');
	hide('manset15a');hide('manset15b');hide('manset15c');



		


    document.getElementById('manset'+divID+'a').style.display = 'block';
    document.getElementById('manset'+divID+'b').style.display = 'block';
    document.getElementById('manset'+divID+'c').style.display = 'block';
    }

function hide(divID)
    {

	document.getElementById(''+divID+'').style.display = 'none';
    }
</SCRIPT>
<body>


</table><script type="text/javascript"><!--
google_ad_client = "ca-pub-9580652213680630";
/* 468x15, oluþturulma 24.07.2008 */
google_ad_slot = "6183018040";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<center>

<table width="598" border="0" cellspacing="0" cellpadding="0">
  <tr><td>
	<table width="598" border="0" cellspacing="1" cellpadding="0">
    
	<!-- RESIM BASLANGIÇ -->

<center>
<div id=manset0c style="DISPLAY: block"><a href="<?=sil($kategorim[0])?>/<?=sil($baslik[0])?>-<?=$haberid[0]?>.htm" onmouseover=showManset(0) title="<?=$baslik[0]?>"><img width="596" height="322" border="0" hspace="0" src="images_up/<?=$resim[0] ?>"></a></div> 
<div id=manset1c style="DISPLAY: none"><a href="<?=sil($kategorim[1])?>/<?=sil($baslik[1])?>-<?=$haberid[1]?>.htm" onmouseover=showManset(1) title="<?=$baslik[1]?>"><img width="596" height="322" border="0" hspace="0" src="images_up/<?=$resim[1] ?>"></a></div> 
<div id=manset2c style="DISPLAY: none"><a href="<?=sil($kategorim[2])?>/<?=sil($baslik[2])?>-<?=$haberid[2]?>.htm" onmouseover=showManset(2) title="<?=$baslik[2]?>"><img width="596" height="322" border="0" hspace="0" src="images_up/<?=$resim[2] ?>"></a></div> 
<div id=manset3c style="DISPLAY: none"><a href="<?=sil($kategorim[3])?>/<?=sil($baslik[3])?>-<?=$haberid[3]?>.htm" onmouseover=showManset(3) title="<?=$baslik[3]?>"><img width="596" height="322" border="0" hspace="0" src="images_up/<?=$resim[3] ?>"></a></div> 
<div id=manset4c style="DISPLAY: none"><a href="<?=sil($kategorim[4])?>/<?=sil($baslik[4])?>-<?=$haberid[4]?>.htm" onmouseover=showManset(4) title="<?=$baslik[4]?>"><img width="596" height="322" border="0" hspace="0" src="images_up/<?=$resim[4] ?>"></a></div> 
<div id=manset5c style="DISPLAY: none"><a href="<?=sil($kategorim[5])?>/<?=sil($baslik[5])?>-<?=$haberid[5]?>.htm" onmouseover=showManset(5) title="<?=$baslik[5]?>"><img width="596" height="322" border="0" hspace="0" src="images_up/<?=$resim[5] ?>"></a></div> 
<div id=manset6c style="DISPLAY: none"><a href="<?=sil($kategorim[6])?>/<?=sil($baslik[6])?>-<?=$haberid[6]?>.htm" onmouseover=showManset(6) title="<?=$baslik[6]?>"><img width="596" height="322" border="0" hspace="0" src="images_up/<?=$resim[6] ?>"></a></div> 
<div id=manset7c style="DISPLAY: none"><a href="<?=sil($kategorim[7])?>/<?=sil($baslik[7])?>-<?=$haberid[7]?>.htm" onmouseover=showManset(7) title="<?=$baslik[7]?>"><img width="596" height="322" border="0" hspace="0" src="images_up/<?=$resim[7] ?>"></a></div> 
<div id=manset8c style="DISPLAY: none"><a href="<?=sil($kategorim[8])?>/<?=sil($baslik[8])?>-<?=$haberid[8]?>.htm" onmouseover=showManset(8) title="<?=$baslik[8]?>"><img width="596" height="322" border="0" hspace="0" src="images_up/<?=$resim[8] ?>"></a></div> 
<div id=manset9c style="DISPLAY: none"><a href="<?=sil($kategorim[9])?>/<?=sil($baslik[9])?>-<?=$haberid[9]?>.htm" onmouseover=showManset(9) title="<?=$baslik[9]?>"><img width="596" height="322" border="0" hspace="0" src="images_up/<?=$resim[9] ?>"></a></div> 
<div id=manset10c style="DISPLAY: none"><a href="<?=sil($kategorim[10])?>/<?=sil($baslik[10])?>-<?=$haberid[10]?>.htm" onmouseover=showManset(10) title="<?=$baslik[10]?>"><img width="468" height="241" border="0" hspace="0" src="images_up/<?=$resim[10] ?>"></a></div> 
<div id=manset11c style="DISPLAY: none"><a href="<?=sil($kategorim[11])?>/<?=sil($baslik[11])?>-<?=$haberid[11]?>.htm" onmouseover=showManset(11) title="<?=$baslik[11]?>"><img width="468" height="241" border="0" hspace="0" src="images_up/<?=$resim[11] ?>"></a></div> 
<div id=manset12c style="DISPLAY: none"><a href="<?=sil($kategorim[12])?>/<?=sil($baslik[12])?>-<?=$haberid[12]?>.htm" onmouseover=showManset(12) title="<?=$baslik[12]?>"><img width="468" height="241" border="0" hspace="0" src="images_up/<?=$resim[12] ?>"></a></div> 
<div id=manset13c style="DISPLAY: none"><a href="<?=sil($kategorim[13])?>/<?=sil($baslik[13])?>-<?=$haberid[13]?>.htm" onmouseover=showManset(13) title="<?=$baslik[13]?>"><img width="468" height="241" border="0" hspace="0" src="images_up/<?=$resim[13] ?>"></a></div> 
<div id=manset14c style="DISPLAY: none"><a href="<?=sil($kategorim[14])?>/<?=sil($baslik[14])?>-<?=$haberid[14]?>.htm" onmouseover=showManset(14) title="<?=$baslik[14]?>"><img width="468" height="241" border="0" hspace="0" src="images_up/<?=$resim[14] ?>"></a></div> 
<div id=manset15c style="DISPLAY: none"><a href="<?=sil($kategorim[15])?>/<?=sil($baslik[15])?>-<?=$haberid[15]?>.htm" onmouseover=showManset(15) title="<?=$baslik[15]?>"><img width="468" height="241" border="0" hspace="0" src="images_up/<?=$resim[15] ?>"></a></div> </center>
	<!-- RESIM BITISI -->
	</td>

<tr><center>
    <td align="Center" width="596" height="40" background="images/transparan3.png"></center>
	<!-- BASLIK -->
	<? 
	function strtoupperTR($str)
{
   $str = str_replace(array('i', 'ý', 'ü', 'ð', 'þ', 'ö', 'ç'), array('Ý', 'I', 'Ü', 'Ð', 'Þ', 'Ö', 'Ç'), $str);
   return strtoupper($str);

}
	?>
	

<font face="Arial" color="#FFFFFF" style="font-size:22px; font-weight:bold; ">
<div id=manset0a style="DISPLAY: block"><?=(substr($baslik[0],0,52)) ?>...</div> 
<div id=manset1a style="DISPLAY: none"><?=(substr($baslik[1],0,52)) ?>...</div>
<div id=manset2a style="DISPLAY: none"><?=(substr($baslik[2],0,52)) ?>...</div>
<div id=manset3a style="DISPLAY: none"><?=(substr($baslik[3],0,52)) ?>...</div>
<div id=manset4a style="DISPLAY: none"><?=(substr($baslik[4],0,52)) ?>...</div>
<div id=manset5a style="DISPLAY: none"><?=(substr($baslik[5],0,52)) ?>...</div>
<div id=manset6a style="DISPLAY: none"><?=(substr($baslik[6],0,52)) ?>...</div>
<div id=manset7a style="DISPLAY: none"><?=(substr($baslik[7],0,52)) ?>...</div>
<div id=manset8a style="DISPLAY: none"><?=(substr($baslik[8],0,52)) ?>...</div>
<div id=manset9a style="DISPLAY: none"><?=(substr($baslik[9],0,52)) ?>...</div>
<div id=manset10a style="DISPLAY: none"><?=(substr($baslik[10],0,48)) ?>...</div>
<div id=manset11a style="DISPLAY: none"><?=(substr($baslik[11],0,48)) ?>...</div>
<div id=manset12a style="DISPLAY: none"><?=(substr($baslik[12],0,48)) ?>...</div>
<div id=manset13a style="DISPLAY: none"><?=(substr($baslik[13],0,48)) ?>...</div>
<div id=manset14a style="DISPLAY: none"><?=(substr($baslik[14],0,48)) ?>...</div>
<div id=manset15a style="DISPLAY: none"><?=(substr($baslik[15],0,48)) ?>...</div></font>



	<!-- BASLIK BITIS -->
	
	</td>



	 
<tr><td>

<a href="<?=sil($kategorim[0])?>/<?=sil($baslik[0])?>-<?=$haberid[0]?>.htm" onmouseover=showManset(0) title="<?=$baslik[0]?>"><img width="61" height="42" border="0" hspace="1" src="images_up/<?=$resim[0] ?>"></a>
<a href="<?=sil($kategorim[1])?>/<?=sil($baslik[1])?>-<?=$haberid[1]?>.htm" onmouseover=showManset(1) title="<?=$baslik[1]?>"><img width="61" height="42" border="0" hspace="1" src="images_up/<?=$resim[1] ?>"></a>
<a href="<?=sil($kategorim[2])?>/<?=sil($baslik[2])?>-<?=$haberid[2]?>.htm" onmouseover=showManset(2) title="<?=$baslik[2]?>"><img width="61" height="42" border="0" hspace="1" src="images_up/<?=$resim[2] ?>"></a>
<a href="<?=sil($kategorim[3])?>/<?=sil($baslik[3])?>-<?=$haberid[3]?>.htm" onmouseover=showManset(3) title="<?=$baslik[3]?>"><img width="61" height="42" border="0" hspace="1" src="images_up/<?=$resim[3] ?>"></a>
<a href="<?=sil($kategorim[4])?>/<?=sil($baslik[4])?>-<?=$haberid[4]?>.htm" onmouseover=showManset(4) title="<?=$baslik[4]?>"><img width="61" height="42" border="0" hspace="1" src="images_up/<?=$resim[4] ?>"></a>
<a href="<?=sil($kategorim[5])?>/<?=sil($baslik[5])?>-<?=$haberid[5]?>.htm" onmouseover=showManset(5) title="<?=$baslik[5]?>"><img width="61" height="42" border="0" hspace="1" src="images_up/<?=$resim[5] ?>"></a>
<a href="<?=sil($kategorim[6])?>/<?=sil($baslik[6])?>-<?=$haberid[6]?>.htm" onmouseover=showManset(6) title="<?=$baslik[6]?>"><img width="61" height="42" border="0" hspace="1" src="images_up/<?=$resim[6] ?>"></a>
<a href="<?=sil($kategorim[7])?>/<?=sil($baslik[7])?>-<?=$haberid[7]?>.htm" onmouseover=showManset(7) title="<?=$baslik[7]?>"><img width="61" height="42" border="0" hspace="0" src="images_up/<?=$resim[7] ?>"></a>
<a href="<?=sil($kategorim[8])?>/<?=sil($baslik[8])?>-<?=$haberid[8]?>.htm" onmouseover=showManset(8) title="<?=$baslik[8]?>"><img width="60" height="42" border="0" hspace="0" src="images_up/<?=$resim[8] ?>"></a>

</td></tr>


	</td>
  </tr>

  <tr>

    <td valign="center">

	<!-- GIRIS BASLANGIÇ -->
	<div id=manset0b style="DISPLAY: block"><font face="Arial" style="font-size:12px; "></font></div> 
<div id=manset1b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div> 
<div id=manset2b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset3b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset4b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset5b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset6b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset7b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div> 
<div id=manset8b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset9b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset10b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset11b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset12b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset13b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div> 
<div id=manset14b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>
<div id=manset15b style="DISPLAY: none"><font face="Arial" style="font-size:12px; "> </font></div>


	<!-- GIRIS BITISI -->


	</td>

  </tr>
</table>
</center>
</body>
</html>
