<?php 
include("data/db.php");
	  mysql_query("SET NAMES cp1251");
?>
<!DOCTYPE html>
<html class=""><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="stylesheet" href="data/styles1.css" type="text/css" />
<title>Doctors</title>

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

</head>
<body class="for-top-menu">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            
            <a class="navbar-brand" href="">
            <br>
 <div class="hospital-name"><img src="./images/meddata_ico.png" width="32">  Astro Neyromed    </div>
            </a>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li id="Reporting">
<a href="admin.php">Главная</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    
                        <a href="index.php?token=exit" class="dropdown-toggle" data-toggle="dropdown">
admin
                            <i class="icon-angle-down "></i>
                        </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href=" ">Профиль </a></li>
                        <li id="Dashboard">
<a href="http://meddatademo.bepro.uz/ru-RU/Dashboard">Администрирование</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="index.php?token=exit">Выход</a>
                        </li>
                    </ul>
                </li>
            </ul>
            


<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="language name">
                русский (Россия)&nbsp;<span class="sf-sub-indicator">
                    <i class="icon-angle-down "></i>
                </span>
            </span></a>
        <ul class="dropdown-menu" role="menu">
            <li class="divider"></li>
                <li>
                    <a href="http://meddatademo.bepro.uz/uz-Cyrl-UZ/Cashbox/Payment">Ўзбекча (Ўзбекистон&nbsp;Республикаси)</a>
                </li>
                <li>
                    <a href="http://meddatademo.bepro.uz/uz-Latn-UZ/Cashbox/Payment">O'zbekcha (O'zbekiston Respublikasi)</a>
                </li>
        </ul>
    </li>
</ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<table width="90%" align="center"><tr><td>

<?php 

$fio=$_GET['fio'];
$mutax=$_GET['mutax'];
$phone=$_GET['phone'];
$did=$_GET['x'];   /////////   doctorning id si
$xol=$_GET['y'];   /////////   Xolat o'chirishmi yoki taxrirlash
if (isset($fio)!="")
{
	if ($xol!="")
	{
mysql_query("UPDATE `doctors` SET `fio` = '$fio', `xiz_name` = '$mutax', `phone` = '$phone' WHERE `doctors`.`id` = $did LIMIT 1;");
echo("Ma`lumotlar o`zgartirildi!");
echo("<a href=doctor.php>Orqaga qaytish</a>");
exit;
	}
	else{
mysql_query("INSERT INTO `doctors` (`id`, `fio`, `xiz_name`, `phone`, `oxir_num`) VALUES (NULL, '$fio', '$mutax', '$phone', '0');");
echo("Ma`lumotlar saqlandi!");
echo("<a href=doctor.php>Orqaga qaytish</a>");
exit;
	}
}
else
{
	if($xol==2)    ///  O'chirish xolatida
	{  
$mm=mysql_query("DELETE FROM `doctors` WHERE `doctors`.`id` = $did LIMIT 1");
	echo("<b><u>Ma`lumotlar o`chirildi!</u></b>");
	}
	if ($xol==1) {  ///////////////////  O'zgartirish xolati tanlanganda
$chad=mysql_query("Select * from `doctors` where `doctors`.`id` = $did");
$nat=mysql_fetch_array($chad);
?>
<div align="center"><strong>Doktorlarni ro'yhatgan olish</strong></div>
<form action="doctor.php" method="get" class="form-control">
<input type="hidden" name="y" value="2" class="form-control" />
<input type="hidden" name="x" value="<?php  echo($did); ?>" class="form-control" />
Doktorning ismi familiyas: <input type="text" name="fio" size="60" value="<?php echo($nat['fio']); ?>"  class="form-control"/><br />
Mutaxassisligi: 
<select name="mutax" id="jumpMenu" class="form-control">
<?php 
$dat=mysql_query("Select * from `xizmatlar`");
while ($my=mysql_fetch_array($dat))
{
echo("<option>");
echo($my['xizmat_name']);
echo("</option>");
}
?>

</select>
<br />
Telefon raqami: (+998) <input type="text" name="phone"  class="form-control" value="<?php echo($nat['phone']); ?>" /><br />
<input type="submit" value="Saqlash" />
</form>


<?php 
	exit;
	}    ///////////////////  O'zgartirish xolati tanlanganda
?>
<div align="center"><strong>Doktorlarni ro'yhatgan olish</strong></div>
<form action="doctor.php" method="get" class="form-control">
Doktorning ismi familiyas: <input type="text" class="form-control" name="fio" size="60" /><br />
Mutaxassisligi: 
<select name="mutax" id="jumpMenu" class="form-control">
<?php 


$dat=mysql_query("Select * from `xizmatlar`");
while ($my=mysql_fetch_array($dat))
{
echo("<option>");
echo($my['xizmat_name']);
echo("</option>");
}




?>

</select>
<br />
Telefon raqami: (+998) <input type="text" name="phone" /><br /><br>

<input type="submit" value="Saqlash" class="form-control" />
</form>
<?php } ?><br />

<table width="100%" bordercolor="#3366FF" align="center" border="2">
<tr bgcolor="#A6A6FF"><td>Doktorning familiyasi</td><td>mutaxasisligi</td><td>Telefoni</td><td width="50">&nbsp;</td></tr>

<?php 
$dd=mysql_query("select * from `doctors`");
while ($mm=mysql_fetch_array($dd))
{
	echo"<tr><td>";
echo($mm['fio']);
echo"</td><td>";
echo($mm['xiz_name']);
echo"</td><td>";
echo($mm['phone']);
echo"</td><td>";
echo("<a title=o`zgartirish href=doctor.php?x=".$mm['id']."&y=1>");
echo"<img src=data/edit.png></a>&nbsp;&nbsp;&nbsp;&nbsp;";
echo("<a title=o`chirish href=doctor.php?x=".$mm['id']."&y=2>");
echo"<img src=data/delete.png></a>";

echo"</td></tr>";
}


?>
</table>
</td></tr></table>
</body>
</html>