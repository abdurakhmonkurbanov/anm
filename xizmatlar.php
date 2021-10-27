<?php 
include("data/db.php");
	  mysql_query("SET NAMES cp1251");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" href="data/styles1.css" type="text/css" />
<title>Xizmatlar</title>
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

    
<?php
$nn=$_GET['nn'];
$xiz_n=$_GET['xizmat_name'];
$bxiz_n=$_GET['bor_xizmat_name'];
$xtson=$_GET['xtson'];
$i=1;
while ($i<=$xtson)
{
	$a[$i]=$_GET["xiz_type$i"];
	$b[$i]=$_GET["narx$i"];
	$i=$i+1;
}
if(($xiz_n!=""))
{
mysql_query("INSERT INTO `xizmatlar` (`id`, `xizmat_name`) VALUES (NULL, '$xiz_n'); ");	
$dbx=mysql_query("select * from `xizmatlar` where `xizmat_name` like '$xiz_n'");
$mdbx=mysql_fetch_array($dbx);
$x_id=$mdbx['id'];	

$i=1;
while($i<=$xtson)
{
	mysql_query("INSERT INTO `xizmat_type` (`id`, `xiz_name_id`, `xizmat_type`, `narxi`) VALUES (NULL, '$x_id', '$a[$i]', '$b[$i]');");
	$i++;	
}
echo"Ma`lumotlar saqlandi<br><a href=xizmatlar.php>Qaytish</a>";
exit;
}
if($bxiz_n!="")
{
$dbb=mysql_query("select * from `xizmatlar` where `xizmat_name` like '$bxiz_n'");
$mdbb=mysql_fetch_array($dbb);
$bxid=$mdbb['id'];	
$i=1;
while($i<=$xtson)
{
	mysql_query("INSERT INTO `xizmat_type` (`id`, `xiz_name_id`, `xizmat_type`, `narxi`) VALUES (NULL,'$bxid', '$a[$i]', '$b[$i]');");
	$i++;	
}
echo"Ma`lumotlar saqlandi<br><a href=xizmatlar.php>Qaytish</a>";
exit;
}
///////////////////////////   Yozuvlarni o`chirish
$x=$_GET['x'];
if($x!="")
{
$dbd=mysql_query("select * from `xizmat_type` where `id` = '$x'");
$mdbd=mysql_fetch_array($dbd);
$xiz_id=$mdbd['xiz_name_id'];
mysql_query("delete from `xizmat_type` where `id` = '$x'");
$dbd2=mysql_query("select * from `xizmat_type` where `xiz_name_id` = '$xiz_id'");
while($mdbd2=mysql_fetch_array($dbd2))
{
	$tek=$mdbd2['xizmat_type'];
}
if($tek=="")
{
mysql_query("delete from `xizmatlar` where `id` = '$xiz_id'");	
	
}
echo"Ma`lumotlar o`chirildi! <br><a href=xizmatlar.php>Qaytish</a>";
exit;
	
}



////////////////////////////// O1chirish tugadi
?>
<br>
<table width="90%" align="center"><tr><td>

<form name="form1" method="get" action="xizmatlar.php" class="form-control">
 
Agar yangi xizmat turini kiritish kerak bo`lsa: <input type="text" name="xizmat_name" placeholder="yangi xizmat nomi" id="textfield" size="50">
<br><br>

Agar mavjud xizmat turiga qo`shish kerak bo`lsa 
  <label>Xizmatlar turini tanlang:   
              <select name="bor_xizmat_name" id="select">
              <option value=""><strong>Xizmatlar turi</strong></option>
			<?php $dat=mysql_query("select * from `xizmatlar`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option>";  echo($myr['xizmat_name']);echo"</option>";

			}  ?>
              </select></label> <br><br>
<hr>
<a href="xizmatlar.php?nn=<?php $nn=$nn+1; echo($nn); ?>">Xizmat ko'rsatish turilarini qo'shish <img src="+.png" alt="Yangi xizmatlar qo`sish" width="20" height="20"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="xizmatlar.php"> Bekor qilish <img src="x.png" alt="bekor qilish" width="15" height="15"> </a><br><br>

<?php 
$k=0;
while ($k<$nn)
{
$k=$k+1;
echo"$k - ";
echo"xizmat turi: ";
echo ("<input type=text name=xiz_type");
echo($k);
echo(" size=50>");
echo" &nbsp;&nbsp;Narxi: ";
echo ("<input type=text name=narx");
echo($k);
echo(" size=20>");
echo"<br>";
}

?>
<input type="hidden" name="xtson" value="<?php  echo $nn; ?>">
<br><input type="submit" value="-----Saqlash-----">
</form>
<br>

 
<table width="100%" bordercolor="#3366FF" align="center" border="2">
<tr bgcolor="#A6A6FF"><td>Xizmat nomi</td><td>Xizmat turi</td><td>narxi</td><td width="50">&nbsp;</td></tr>
<?php 
$dd=mysql_query("select * from `xizmat_type` ORDER BY `id` DESC");
while ($mm=mysql_fetch_array($dd))
{
$xid=$mm['xiz_name_id'];
$dd1=mysql_query("SELECT *  FROM `xizmatlar` WHERE `id` = '$xid'");
$mm1=mysql_fetch_array($dd1);
echo"<tr><td>";
echo($mm1['xizmat_name']);
echo"</td><td>";
echo($mm['xizmat_type']);
echo"</td><td>";
echo($mm['narxi']."</td><td>");
echo("<a title=o`zgartirish href=xizedit.php?x=".$mm['id'].">");
echo"<img src=data/edit.png></a>&nbsp;&nbsp;&nbsp;&nbsp;";
echo("<a title=o`chirish href=xizmatlar.php?x=".$mm['id'].">");
echo"<img src=data/delete.png></a>";


echo"</td></tr>";
	
}

?>
</table>
</td></tr></table>
</body>
</html>