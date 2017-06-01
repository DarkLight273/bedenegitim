<?php
//date_default_timezone_set("Europe/Istanbul");
require_once("guvenlik.php");
require_once("baglan.php");
require_once("ayarlar.php");
header('content-type: text/html; charset=iso-8859-9');

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
<title>Yönetim Paneli</title>
</head>
<?php include "head.php"; ?>


<body>
<table width="800" border="0" cellspacing="0" cellpadding="0" align="center" class="anatablo">
  <tr>
    <td><?php include "ust.php"; ?></td>
  </tr>
  <tr>
    <td>
	<!-- Basla -->
	<?php
	$ekle = $_POST["ekle"];

if($ekle == "1"){

$kategori= $_POST["kategori"];
$baslik = $_POST["baslik"];
$giris = $_POST["giris"];
$icerik = nl2br($_POST["icerik"]);
$kaynak = $_POST["kaynak"];
$video = $_POST["video"];
$videokod = $_POST["videokod"];
$gizle = $_POST["gizle"];
$tarih = date("Y-m-d");
$saat = date("H:i:s");




$girisOK = str_replace ("'"," ",$giris);
$icerikOK = str_replace ("'"," ",$icerik);
$baslikOK = str_replace ("'"," ",$baslik);
$kaynakOK = str_replace ("'"," ",$kaynak);


 $resim = "";
if($_FILES['resim']['name'] !== ""){
$resim = $_FILES['resim']['name'];
$resim_isim_1 = Array('ı','ğ','Ğ','ü','Ü','ş','Ş','İ','ö','Ö','ç','Ç');
$resim_isim_2 = Array('i','g','G','u','U','s','S','I','o','O','c','C');
for($d=0; $d<count($resim_isim_1); $d++){
	$resim = ereg_replace($resim_isim_1[$d], $resim_isim_2[$d], $resim);
}

$uploadfile = $uploaddir.$resim;

list($width, $height, $type, $attr) = getimagesize($_FILES['resim']['tmp_name']); 


	move_uploaded_file($_FILES['resim']['tmp_name'], $uploadfile);
if($width > 466){
	$filename = $uploadfile;      
   $source = imagecreatefromjpeg($filename);  
   $thumbX = "466";    
   $imageX = imagesx($source);
   $imageY = imagesy($source);   
   $thumbY = ($thumbX*$imageY)/$imageX;
   $dest  = imagecreatetruecolor($thumbX, $thumbY);
   imagecopyresampled ($dest, $source, 0, 0, 0, 0, $thumbX, $thumbY, $imageX, $imageY);
   imagejpeg($dest, "../images_up/".$resim);

}

}

$sqlsorgu = "INSERT INTO haberler VALUES('','$kategori','$baslikOK','$girisOK','$icerikOK<br>$videokod','$kaynakOK','$resim','$video','$tarih','$saat','$gizle','','')";
mysql_query($sqlsorgu);
echo "<table align='center' width='98%' class='haberler' bgcolor='#F1FCDC'><tr><td align='center'><h1> TEBRIKLER HABER EKLENDI</h1></td></tr></table>";
echo "<meta http-equiv='refresh' content='3;URL=haber_kat_listele.php'>";
}

?>
<form  enctype="multipart/form-data" name="haber_ekle" method="POST" action="haber_ekle.php">
	<INPUT TYPE="hidden" name="ekle" value="1">
	<input type="hidden" name="MAX_FILE_SIZE" value="1048576">

<table class="haberler" width="98%" border="0" align="center" cellpadding="3" cellspacing="0">
 <tr bgcolor="#DEE2D6">
    <td colspan="2" background="images/bg30.jpg" height="30" valign="bottom"><b>HABER EKLE</b></td>
  </tr>
 <tr bgcolor="#FFFFFF">
    <td width="150" align="right">Kategori</td>
    <td>
      <select name="kategori" class="buton">
        <?
     $sql = mysql_query("SELECT * FROM haber_kat ORDER BY id ASC");
	 while ($kat=mysql_fetch_array ($sql)){
	?>
        <option value="<? echo $kat["id"];?>"><? echo $kat["kategori"];?></option>
        <?
	}
	?>
      </select>	</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right">Baslik</td>
    <td><input name="baslik" type="text" size="50" maxlength="150" class="input"></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right">Giriş</td>
    <td><textarea name="giris" cols="50" rows="4" class="input"></textarea></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right">İçerik</td>
    <td><textarea name="icerik" id="icerik" rows="5" cols="46" class="input"></textarea>
	<script language="javascript1.2">
  generate_wysiwyg('icerik');
</script></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right">Resim</td>
    <td><input name="resim" type="file" size="50" class="input"></td>
  </tr>
  <tr>
    <td align="right">Kaynak</td>
    <td><input type="text" name="kaynak" class="input" size="25"></td>
  </tr>
  <tr>
    <td align="right">Video</td>
    <td style="font-size:10px; color:#006699; font-family:Tahoma; "> Var: <input name="video" type="radio" value="1"> &nbsp; Yok: <input name="video" type="radio" value="0" checked></td>
  </tr>
  <tr>
    <td align="right">Video Kodu</td>
    <td><input type="text" name="videokod" class="input" size="50"></td>
  </tr>
  <tr>
      <td width="150" align="center" background="images/td_gonder.jpg"> <select name="gizle" id="gizle"  class="buton">
  <option value="0" selected>Aktif</option>
  <option value="1">Pasif</option>
  </select></td>
	  <td background="images/td_gonder.jpg"><input type="submit"  value="Haberi Ekle" class="buton">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="Gönder" type="reset" id="Gönder" value="Temizle" class="buton"></td>
   </tr>
  </table>
  <br>
</form>
	<!-- BITIR -->
	</td>
  </tr>
  <tr>
    <td><?php include "alt.php"; ?></td>
  </tr>
</table>


</body>
</html>
