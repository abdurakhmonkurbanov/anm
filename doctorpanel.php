<?php 
session_start();
include("data/db.php");
	  mysql_query("SET NAMES cp1251");
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

<title>Doktorlar uchun panel</title>
</head>

<body class="for-top-menu">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            
            <a class="navbar-brand" href="index.php">
            <br>
 <div class="hospital-name"><img src="./images/meddata_ico.png" width="32">  Astro Neyromed    </div>
            </a>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li id="Reporting">
<a href="<?php echo $_SERVER['PHP_SELF'];  ?>"><strong>Yangilash</strong></a>
                </li>
            </ul> 
             
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    
                        <a href="index.php?token=exit" class="dropdown-toggle" data-toggle="dropdown">
admin
                            <i class="icon-angle-down "></i>
                        </a>

                    <ul class="dropdown-menu" role="menu">
                    <li><a href="">������� </a></li>
                        <li id="Dashboard">
<a href="">�����������������</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="index.php?token=exit">�����</a>
                        </li>
                    </ul>
                </li>
            </ul>
            


<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="language name">
                ������� (������)&nbsp;<span class="sf-sub-indicator">
                    <i class="icon-angle-down "></i>
                </span>
            </span></a>
        <ul class="dropdown-menu" role="menu">
            <li class="divider"></li>
                <li>
                    <a href="">������� (����������&nbsp;������������)</a>
                </li>
                <li>
                    <a href="">O'zbekcha (O'zbekiston Respublikasi)</a>
                </li>
        </ul>
    </li>
</ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

    <div class="container-fluid main-container">
         <?php
		if($_SESSION['type']==5)      /// Asosiy
   {
	   $doc_id=$_SESSION['doc_id'];
		 ?>

<div class="title" align="center"><b>Doktorlar uchun panel bo'limi</b></div>
<br>
<?php
 
	$ddb=mysql_query("select * from `doctors` where `id` = '$doc_id'");
	$mddb=mysql_fetch_array($ddb);
	echo "Hurmatli: <b>".$mddb['fio']."</b> sizning kunlik xisobotingiz.";

?>
<fieldset><legend>Sanani ko'rsating</legend>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
        <label for="demo1"></label>
       dan: <input type="Text" id="demo1" name="dan" maxlength="25" size="25"/>
        <img src="data/cal.gif" onclick="javascript:NewCssCal('demo1')" style="cursor:pointer"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="demo2"></label>
        gacha: <input type="Text" id="demo2" name="gacha" maxlength="25" size="25"/>
        <img src="data/cal.gif" onclick="javascript:NewCssCal('demo2')" style="cursor:pointer"/>

        <br>
<input type="submit" value="Ekranga chiqarish">        </form></fieldset>
<?php 
$dan=$_POST['dan'];
$gacha=$_POST['gacha'];
$dan=convdate1($dan);
$gacha=convdate1($gacha);
if (($dan!="") and ($gacha!=""))     ////////////////////  sana oralig'ini tanlash
{
echo("<br><font class=col2> Tanlangan muddat&nbsp;&nbsp;&nbsp;<b>".$dan."</b> dan <b>".$gacha."</b> gacha </font><br><br>");
  $doc_id=$_SESSION['doc_id'];
//////////////////////   Shartlar boshlandi

$s="select * from `client` where `date` >= '$dan'   and  `date` <= '$gacha' and `doctors` = '$doc_id'";
 
$s=$s." ORDER BY `id` DESC";
?>
 <div align="center" class="title">Natijalar<br> </div>
<table width="100%" bordercolor="#3366FF" align="center" border="2"><tr class="title1"><td align="center"><strong>�</strong></td>
   <td align="center"><strong>Mijozning familiyasi<br />va ismi </strong></td><td align="center"><strong>Mijozning<br>
passport seriyasi</strong></td><td align="center"><strong> Doktor</strong></td><td align="center"><strong>Tanlangan xizmat </strong></td><td align="center"><strong>Ko'rsatiladigan<br> xizmatlar</strong></td><td align="center"><strong>Ro`yxatga olingan<br> vaqt</strong></td><td align="center"><strong> To'langan pul</strong></td><td align="center"><strong> Plastik</strong></td><td align="center"><strong> Naqt</strong></td> </tr>

<?php
$i=1;  $na=0;  $pl=0;
 
$db1=mysql_query($s);
while ($mdb=mysql_fetch_array($db1))
{
	$xiz_id=$mdb['xiz_name'];
	$xdb=mysql_query("select * from `xizmatlar` where `id` = '$xiz_id'");
	$mxdb=mysql_fetch_array($xdb);
	
	
	$doc_id=$mdb['doctors'];
	$ddb=mysql_query("select * from `doctors` where `id` = '$doc_id'");
	$mddb=mysql_fetch_array($ddb);
if ( ($mdb['t_pul']!=0) and ($mdb['qarz']==0))
{
	echo "<tr><td  align='center'<b>".$mdb['navbat']."</b></td><td>".$mdb['fio']."$td</td><td>".$mdb['passport']."</td><td>".$mddb['fio']."</td><td>".$mxdb['xizmat_name']."</td><td>".$mdb['xizmat_type']."</td><td>".convdate($mdb['date'])."</td><td>".$mdb['t_pul']."</td><td>".$mdb['plastik']."</td><td>".$mdb['naqt']."</td></tr>";

}

 
$pt=$pt+$mdb['t_pul'];
$pp=$pp+$mdb['plastik'];
$pn=$pn+$mdb['naqt'];

	  
}
?>
<tr><td colspan="2" align="center" style="font-size:20px;"><strong>Jami:</strong> </td><td colspan="10"><strong style="color:#00F">To'langan pul: <?php echo $pt; ?></strong><br />
<strong style="color:#0F0">Plastikda: <?php echo $pp; ?></strong><br />
<strong style="color:#F0F">Naqtda: <?php echo $pn; ?></strong><br />
 </td></tr>
</table>
<?php
}
   }
 else
   {
	   echo "Hurmatli foydalanuvchi siz doctor  emassiz. <a href='index.php'>Qaytish</a> ";   
   }
?>
</div>
</body>
</html>