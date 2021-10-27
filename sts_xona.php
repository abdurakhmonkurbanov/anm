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
if($_GET['did']!="")
	{
		$did=$_GET['did'];
		mysql_query("delete from `sts_xona` where `id` = '$did'");
	}


if (($_GET['number']!="") and ($_GET['member']!="") and ($_GET['price']!=""))
{
	$number=$_GET['number'];
	$member=$_GET['member'];
	$price=$_GET['price'];
	$equp=$_GET['equp'];
	if($_GET['cha']!="") ////  O'zgartirish
	{
		$cha=$_GET['cha'];
		mysql_query("UPDATE `sts_xona` SET `number` = '$number', `member` = '$member', `price` = '$price', `equpment` = '$equp' WHERE `id` = '$cha' LIMIT 1;");
		// UPDATE `sts_xona` SET `number` = '$number', `member` = '$member', `price` = '$price', `equpment` = '$equp' WHERE `id` = '$cha' LIMIT 1;
	}
	else					////  Yangi yaratish
	{
		mysql_query("INSERT INTO `sts_xona` (`id`, `number`, `member`, `price`, `equpment`) VALUES (NULL, '$number', '$member', '$price', '$equp');");
	}
echo("Ma`lumotlar saqlandi!");
echo("<a href=sts_xona.php>Orqaga qaytish</a>");
exit;
	
	}
 
 
?>
<div align="center"><strong>Xonalarni ro'yhatgan olish</strong></div>
<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="get" class="form-control-static">
<?php
if($_GET['change']!="")
 {
	 $xc=$_GET['change'];
	$xdb=mysql_query("select * from `sts_xona` where `id` = '$xc'");
	$mxc=mysql_fetch_array($xdb); 
 ?>
 	<input type="hidden" name="cha" value="<?php echo $xc; ?>">
    <?php
 }
?>

Xona raqami <input type="text" name="number" size="60" value="<?php echo $mxc['number']; ?>"  class="form-control-static"/><br /><br>

Xonaga joylashadigan bemorlar soni
 <input type="text" name="member" size="60" value="<?php echo $mxc['member']; ?>"  class="form-control-static"/><br />
<br>

Xona narxi <input type="text" name="price" value="<?php echo $mxc['price']; ?>"  class="form-control-static" value="" /><br />
<br>
Xonadagi jihoszlar: <textarea rows="5" cols="25" name="equp" class="form-control-static" ><?php echo $mxc['equpment']; ?></textarea><br />
 
<input type="submit"  class="form-control-static" value="Saqlash" />
</form>
 <br />

<table width="100%" bordercolor="#3366FF" align="center" border="2">
<tr bgcolor="#A6A6FF"><td>Xona raqami</td><td>Xonada joylashadigan bemorlar soni</td><td>narxi</td><td>Xonadagi jixozlar</td><td width="50">&nbsp;</td></tr>

<?php 
$dd=mysql_query("select * from `sts_xona`");
while ($mm=mysql_fetch_array($dd))
{
	echo"<tr><td>";
echo($mm['number']."-xona");
echo"</td><td>";
echo($mm['member']." ta bemor");
echo"</td><td>";
echo($mm['price']." so`m");
echo"</td><td>";
echo($mm['equpment']."");
echo"</td><td>";
echo("<a title=o`zgartirish href=sts_xona.php?change=".$mm['id'].">");
echo"<img src=data/edit.png></a>&nbsp;&nbsp;&nbsp;&nbsp;";
echo("<a title=o`chirish href=sts_xona.php?did=".$mm['id'].">");
echo"<img src=data/delete.png></a>";

echo"</td></tr>";
}


?>
</table>
</td></tr></table>
</body>
</html>