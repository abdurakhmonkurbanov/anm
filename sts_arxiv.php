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

<title>Arxiv</title>
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
<a href="sts_arxiv.php"><strong>Yangilash</strong></a>
                </li>
            </ul> 
            
            <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a href="sts_main.php?token=reg"><strong>Ro'yxatga olish</strong></a>
                </li>
            </ul> 
            <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a href="sts_main.php?token="><strong>Asosiy oyna</strong></a>
                </li>
            </ul>  <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a href="sts_arxiv.php?token="><strong>Arxiv bo`limi</strong></a>
                </li>
            </ul> 
             
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
admin
                            <i class="icon-angle-down "></i>
                        </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="">Профиль </a></li>
                        <li id="Dashboard">
<a href="">Администрирование</a>
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
                    <a href="">Ўзбекча (Ўзбекистон&nbsp;Республикаси)</a>
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
		if($_GET['did']!="")
			{
				$did=$_GET['did'];
				mysql_query("delete from `sts_main` where `id` = '$did'");	
	
			}
		
		?>
        

<div class="title" align="center"><b>Axriv bo'limi</b></div>
<br>
<fieldset><legend>Sanani ko'rsating</legend>
        <form method="post" action="<?php  echo $_SERVER['PHP_SELF'];  ?>">
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
if (($dan!="") and ($gacha!=""))     ////////////////////  sana oralig'ini tanlash
{
echo(" <font class=col2> Tanlangan muddat&nbsp;&nbsp;&nbsp;<b>".$dan."</b> dan <b>".$gacha."</b> gacha </font> <br>");

//////////////////////   Shartlar boshlandi
?>
 <div align="center" class="title">Natijalar<br> </div>
 <hr style="border-color:#00C; margin-top:40px"/>        
<div class="row" style="margin-left:50px">
 
     <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
            
     
   <label>Xonalar bo'yicha
              <select class="form-control" name="x_id" id="select">
              <option value="0">Xonani tanlang</option>
			<?php $dat=mysql_query("select * from `sts_xona`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option value='".$myr['id']."'>";  echo($myr['number']);echo"-xona</option>";

			}  
			?>
              </select>
          </label>  
    
   <input type="hidden" name="token" value="">
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <input type="text" class="k-edit-form-container" name="fio" placeholder="FIO">      <input type="submit" class="btn btn-success" value="Найти"> 
</form>
 
    
      </div>
<br>
 <table width="100%" bordercolor="#3366FF" align="center" border="2"><tr class="title1"><td align="center"><strong>№</strong></td>
   <td align="center"><strong>Mijozning familiyasi<br />va ismi </strong></td><td align="center"><strong>Mijozning<br>
  passport seriyasi</strong></td><td align="center"><strong> Xona</strong></td><td align="center"><strong> Qarovchi</strong></td><td align="center"><strong> Doktor</strong></td><td align="center"><strong> Davolanish muddati</strong></td>
   <td align="center"><strong>Ro`yxatga olingan<br> vaqt</strong></td>
  <td align="center"><strong> To'langan pul</strong></td><td align="center"><strong> Qarz</strong></td>< </tr>
<?php
$pt=0;
$pq=0;
$pn=0;
$pp=0;
$fio=$_POST['fio'];
$x_id=$_POST['x_id'];
$s="select * from `sts_main` where `check` = 1  ";
if($fio!="") { $s=$s." and `fio` like '%$fio%'"; }
if(($x_id!="0") and ($x_id!="")) { $s=$s." and `xona_id` = '$x_id'";}
$s=$s." ORDER BY `id` DESC";
		
		 
$db1=mysql_query($s);
while ($mdb=mysql_fetch_array($db1))
{
	$gch=$mdb['gacha'];
	$day1=$mdb['date'];
	 $kun=sana($day1,$gch);
	
	$doc_id=$mdb['d_id'];
	$ddb=mysql_query("select * from `doctors` where `id` = '$doc_id'");
	$mddb=mysql_fetch_array($ddb);
	
	$xona_id=$mdb['xona_id'];
	$xodb=mysql_query("select * from `sts_xona` where `id` = '$xona_id'");
	$mxodb=mysql_fetch_array($xodb);
	
if ( ($mdb['t_pul']!=0) and ($mdb['qarz']==0))
{
	 
	echo "<tr><td align='center'><a href='sts_client.php?pid=".$mdb['id']."&a=1'><b>".$mdb['navbat']."</b></a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mdb['fio']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mdb['passport']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mxodb['number']."-xona</a></td>";
	if ($mdb['qarovchi']==1) echo "	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>qarovchi</a></td>";
	else echo "<td>&nbsp;</td>";
	echo "<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mddb['fio']."</a></td>
 
 	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$kun." kun</a></td>

	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".convdate($mdb['date'])."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mdb['t_pul']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mdb['qarz']."</a></td>
	 </tr>";
	$pt=$pt+$mdb['t_pul'];
	$pp=$pp+$mdb['plastik'];
	$pn=$pn+$mdb['naqt'];
}
else
{
	echo"<tr";
if ($mdb['t_pul']==0) echo " bgcolor='#FFFF99'";
if ($mdb['qarz']!=0) echo " bgcolor='#Fcf'";

echo "><td align='center'><a href='sts_client.php?pid=".$mdb['id']."&a=1'><b>".$mdb['navbat']."</b></a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mdb['fio']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mdb['passport']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mxodb['number']."-xona</a></td>";
	if ($mdb['qarovchi']==1) echo "	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>qarovchi</a></td>";
	else echo "<td>&nbsp;</td>";
	echo "<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mddb['fio']."</a></td>
 
 	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$kun." kun</a></td>

	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".convdate($mdb['date'])."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mdb['t_pul']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."&a=1'>".$mdb['qarz']."</a></td>
	</tr>";

}
 if ( ($mdb['t_pul']!=0) and ($mdb['qarz']!=0)) $pq=$pq+$mdb['qarz'];
}


	  

?>
<tr><td colspan="2" align="center" style="font-size:20px;"><strong>Jami:</strong> </td><td colspan="10"><strong style="color:#00F">To'langan pul: <?php echo $pt; ?></strong><br />
<!--<strong style="color:#0F0">Plastikda: <?php echo $pp; ?></strong><br />
<strong style="color:#F0F">Naqtda: <?php echo $pn; ?></strong><br />-->
<strong style="color:#300">Kunlik qarz: <?php echo $pq; ?></strong><br />
<strong style="color:#006464">Umumiy summa:  <?php $pu=$pt+$pq; echo $pu; ?></strong></td></tr>
</table>
<?php
}
?>
</div>
</body>
</html>