<?php 
include("data/db.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

    <script src="date/datetimepicker_css.js"></script>
 <link rel="shortcut icon" href="http://meddatademo.bepro.uz/Content/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://meddatademo.bepro.uz/Content/images/favicon.ico" type="image/x-icon">


    <meta name="viewport" content="width=device-width">
    <!--Icons-->

    <link href="style/navigation-icon.css" rel="stylesheet">
    <link href="style/font-awesome.min.css" rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
    <link href="style/notify.css" rel="stylesheet">
    <!--Icons-->
    <!--Bootstrap - 3.2.0-->
    
    <link href="style/bootstrap.css" rel="stylesheet">
<link href="style/bootstrap-theme.css" rel="stylesheet">


    <!--02.10.2014 select-2-->
    <link href="style/select2.css" rel="stylesheet">
    <link href="style/select2-bootstrap.css" rel="stylesheet">
    <!--02.10.2014 select-2-->
    <!--Bootstrap - 3.2.0-->
    <!--Main Styles-->
    <link href="style/components.css" rel="stylesheet">
<link href="style/bootstrap-edit.css" rel="stylesheet">
<link href="style/main-styles.css" rel="stylesheet">
<link href="style/bepro-select-2.css" rel="stylesheet">
<link href="style/custom.css" rel="stylesheet">

    <!--Main Styles-->
    <!--Kendo-->
    <link href="style/kendo.common.min.css" rel="stylesheet">
    <link href="style/kendo.metro.med.min.css" rel="stylesheet">
    <link href="style/kendo.silver.mobile.min.css" rel="stylesheet">
    <link href="style/kendo.custom.css" rel="stylesheet">
    <link href="style/Site.css" rel="stylesheet">
    

    <link href="style/normalize.min.css" rel="stylesheet">


<title>Xisobot</title>
</head>

<body style="margin-left:25px; margin-right:25px">
<div class="title" align="center"><b>Xisobotlar bo'limi</b></div>
<br>
<fieldset><legend>Sanani ko'rsating</legend>
        <form method="get" action="xisobot.php">
        <label for="demo1"></label>
       dan: <input type="Text" id="demo1" name="dan" maxlength="25" size="25"/>
        <img src="data/cal.gif" onclick="javascript:NewCssCal('demo1')" style="cursor:pointer"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="demo2"></label>
        gacha: <input type="Text" id="demo2" name="gacha" maxlength="25" size="25"/>
        <img src="data/cal.gif" onclick="javascript:NewCssCal('demo2')" style="cursor:pointer"/>

        <br>
<input type="submit" value="Ekranga chiqarish">        </form></fieldset>
<?php 
$dan=$_GET['dan'];
$gacha=$_GET['gacha'];
if (($dan!="") and ($gacha!=""))     ////////////////////  sana oralig'ini tanlash
{
echo("<br><font class=col2> Tanlangan muddat&nbsp;&nbsp;&nbsp;<b>".$dan."</b> dan <b>".$gacha."</b> gacha </font><br><br>");
?>

<?php 
$tur=$_GET['tur'];
$dan1=$dan;
$gacha1=$gacha;    ////////////////////////  Filterni bekor qilish uchun
$dan=substr($dan,6,4)."-".substr($dan,3,2)."-".substr($dan,0,2);
$gacha=substr($gacha,6,4)."-".substr($gacha,3,2)."-".substr($gacha,0,2);   /////////////////  Bazadagi formatlarga o'tkazildi
?>
<fieldset><legend>Tanlangan sana bo'yicha filterlash bo`limi</legend>
<form action="xisobot.php" method="get">

  
     <input type="hidden" name="dan" value="<?php echo($dan1);  ?>">
     <input type="hidden" name="gacha" value="<?php echo($gacha1);  ?>">
       <p>
   
       <label>
         <input type="radio" name="tur" value="1" id="tur_0">
         Doktorlar bo'yicha</label>
       <br>
       <label>
         <input type="radio" name="tur" value="2" id="tur_1">
         Xizmatlar bo'yicha</label>
       <br>
    </p>
    <input class="tugma" type="submit" value="Natija">
</form>
</fieldset><br>

  <?php 
                    

if ($tur==1)              ///////////////////////  Doktor tanlangan bo'lsa
{
?>
 <div align="center" class="title">Natijalar<br> </div>
 <table width="90%" bordercolor="#3366FF" align="center" border="2">
 <tr class="table" bgcolor="#00CC99" align="center"><td><strong>Doktorning familiyasi</strong></td><td align="center"><strong>Xizmat turi</strong></td><td><b>To'langan pul</b></td><td><strong>Mijozlar soni</strong></td></tr>
<?php
$mydoctor=mysql_query("select * from `doctors`");   /////  doktorlarni aniqlash
$jtp=0;
$ucson=0;
while ($myrdoc=mysql_fetch_array($mydoctor))
{
$tp=0;
$docname=$myrdoc['id'];
$myda=mysql_query("SELECT *  FROM `client` WHERE `date` >= '$dan'   and  `date` <= '$gacha'  and `doctors` = '$docname' ORDER BY `client`.`id`  DESC");                                ////////  Doktordagi klientlar son va puli
$cson=0;
while ($myr=mysql_fetch_array($myda))
{
$tp= $tp+(int)$myr['t_pul'];
$cson=$cson+1;
}														////////  Doktordagi klientlar son va pulini aniqlash tugadi
echo("<tr><td>".$myrdoc['fio']."</td><td>".$myrdoc['xiz_name']."</td><td><b>".$tp."</b></td><td>$cson</td></tr>");
$jtp=$jtp+$tp;
$ucson=$ucson+$cson;
}
echo("<tr><td colspan=2 align=center><b>Jami: </b></td><td align=center><b class=col2>$jtp</b></td><td align=center><b class=col2>$ucson</b></td></tr>");
?>
</table>
<?php
}///////// Doktorlar bo'yicha tamom


if ($tur==2)              ///////////////////////  Klient tanlangan bo`lsa tanlangan bo'lsa
{
?>
 <div align="center" class="title">Natijalar<br> </div>
 <table width="90%" bordercolor="#3366FF" align="center" border="2">
  <tr class="table" bgcolor="#00CC99" align="center"><td align="center"><strong>Xizmat turi</strong></td><td><b>To'langan pul</b></td><td><strong>Mijozlar soni</strong></td></tr>
<?php
$mydoctor=mysql_query("select * from `xizmatlar`");   /////  doktorlarni aniqlash
$jtp=0;
$ucson=0;
while ($myrdoc=mysql_fetch_array($mydoctor))
{
$tp=0;
$xizname=$myrdoc['id'];
$myda=mysql_query("SELECT *  FROM `client` WHERE `date` >= '$dan'   and  `date` <= '$gacha'  and `xiz_name` = '$xizname' ORDER BY `id`  DESC");                                ////////  Doktordagi klientlar son va puli
$cson=0;
while ($myr=mysql_fetch_array($myda))
{
$tp= $tp+(int)$myr['t_pul'];
$cson=$cson+1;
}														////////  Doktordagi klientlar son va pulini aniqlash tugadi
echo("<tr><td>".$myrdoc['xizmat_name']."</td><td><b>".$tp."</b></td><td>$cson</td></tr>");
$jtp=$jtp+$tp;
$ucson=$ucson+$cson;
}
echo("<tr><td  align=center><b>Jami: </b></td><td align=center><b class=col2>$jtp</b></td><td align=center><b class=col2>$ucson</b></td></tr>");
}
}											

?>
</table>
</body>
</html>