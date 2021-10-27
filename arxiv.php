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
<a href="arxiv.php"><strong>Yangilash</strong></a>
                </li>
            </ul> 
            <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a href="kassa.php"><strong>Kassa bo'limi</strong></a>
                </li>
            </ul>
             <ul class="nav navbar-nav">

                <li id="Reporting">
<a><strong>Arxiv</strong></a>
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
<?php
if($_SESSION['type']==2)      /// Asosiy
   {
?>
    <div class="container-fluid main-container">
        <?php
		if($_GET['did']!="")
			{
				$did=$_GET['did'];
				mysql_query("delete from `client` where `id` = '$did'");	
	
			}
		
		?>
        

<div class="title" align="center"><b>Axriv bo'limi</b></div>
<br>
<fieldset><legend>Sanani ko'rsating</legend>
        <form method="post" action="arxiv.php">
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
echo("<br><font class=col2> Tanlangan muddat&nbsp;&nbsp;&nbsp;<b>".$dan."</b> dan <b>".$gacha."</b> gacha </font><br><br>");
?>

<?php 
$docname=$_POST['docname'];
$xizname=$_POST['xizname'];
$fam=$_POST['fam'];

?>
<fieldset><legend>Tanlangan sana bo'yicha filterlash bo`limi</legend>
<form action="arxiv.php" method="post">

   <label>Doktorni tanlang
              <select class="form-control" name="docname" id="select">
              <option value="0">Doktorni tanlang</option>
			<?php $dat=mysql_query("select * from `doctors`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option value='".$myr['id']."'>";  echo($myr['fio']);echo"</option>";

			}  ?>
              </select>
          </label>  
          
   <label>Xizmatlar turini tanlang: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    
              <select  class="form-control"   name="xizname" id="select">
              <option value="0"><strong>Xizmatlar turlari</strong></option>
              
			<?php $dat=mysql_query("select * from `xizmatlar`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option value='".$myr['id']."'>";  echo($myr['xizmat_name']);echo"</option>";

			}  ?>
              </select>
          </label>
  <label>Tashqi doktorlarni tanlang
              <select class="form-control" name="tdocname" id="select">
              <option value="0">tashqi doktorni tanlang</option>
			<?php $dat=mysql_query("select * from `tashqidoktor`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option value='".$myr['id']."'>";  echo($myr['fio']);echo"</option>";

			}  ?>
              </select>
          </label>
          <label>
          <input type="checkbox" name="qarz"> Qarzdorlar </label>
Familiya: <input type="text" name="fio">          
     <input type="hidden" name="dan" value="<?php echo($dan);  ?>">
     <input type="hidden" name="gacha" value="<?php echo($gacha);  ?>">     
   <input type="submit" class="btn btn-success" value="Найти">
  <?php 
                    
$dan1=$dan;
$gacha1=$gacha;    ////////////////////////  Filterni bekor qilish uchun
$dan=substr($dan,6,4)."-".substr($dan,3,2)."-".substr($dan,0,2);
$gacha=substr($gacha,6,4)."-".substr($gacha,3,2)."-".substr($gacha,0,2);   /////////////////  Bazadagi formatlarga o'tkazildi
 
  ?>
</form>
</fieldset><br>

<?php 
 
//////////////////////   Shartlar boshlandi
$fio=$_POST['fio'];
$qarz=$_POST['qarz'];
$doc=$_POST['docname'];
$xiz=$_POST['xizname'];
$tdoc=$_POST['tdocname'];
$s="select * from `client` where `date` >= '$dan'   and  `date` <= '$gacha' ";
if($fio!="") { $s=$s." and `fio` like '%$fio%'"; }
if(($doc!="0") and ($doc!="")) { $s=$s." and `doctors` = '$doc'";}
if(($tdoc!="0") and ($tdoc!="")) { $s=$s." and `tash_doctor_id` = '$tdoc'";}
if(($xiz!="0") and ($xiz!="")) { $s=$s." and `xiz_name` = '$xiz'";}
if ($qarz=="on"){ $s=$s." and `qarz` != 0 and `t_pul` != 0 ";}
$s=$s." ORDER BY `id` DESC";
?>
 <div align="center" class="title">Natijalar<br> </div>
<table width="100%" bordercolor="#3366FF" align="center" border="2"><tr class="title1"><td align="center"><strong>№</strong></td>
   <td align="center"><strong>Mijozning familiyasi<br />va ismi </strong></td><td align="center"><strong>Mijozning<br>
passport seriyasi</strong></td><td align="center"><strong> Doktor</strong></td><td align="center"><strong>Tanlangan xizmat </strong></td><td align="center"><strong>Ko'rsatiladigan<br> xizmatlar</strong></td><td align="center"><strong>Ro`yxatga olingan<br> vaqt</strong></td><td align="center"><strong> To'langan pul</strong></td><td align="center"><strong> Plastik</strong></td><td align="center"><strong> Naqt</strong></td><td align="center"><strong> Qarz</strong></td><td><strong>DEL</strong></td><td>Chek</td></tr>

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
	
	$tdoc_id=$mdb['tash_doctor_id'];
	if($tdoc_id!=0)
	{
	$tddb=mysql_query("select * from `tashqidoktor` where `id` = '$tdoc_id'");
	$mtddb=mysql_fetch_array($tddb);
	$td="<br><font size=-2>Bu mijoz <b>".$mtddb['fio']."</b> yo`llanmasi bilan kelgan</font>";
	}
	else $td="";
	

if ( ($mdb['t_pul']!=0) and ($mdb['qarz']==0))
{
	echo "<tr><td align='center'><a href='arxivclient.php?pid=".$mdb['id']."'><b>".$mdb['navbat']."</b></a></td><td><a href='arxivclient.php?pid=".$mdb['id']."'>".$mdb['fio']."</a>$td</td><td><a href='arxivclient.php?pid=".$mdb['id']."'>".$mdb['passport']."</a></td><td><a href='arxivclient.php?pid=".$mdb['id']."'>".$mddb['fio']."</a></td><td><a href='arxivclient.php?pid=".$mdb['id']."'>".$mxdb['xizmat_name']."</a></td><td><a href='arxivclient.php?pid=".$mdb['id']."'>".$mdb['xizmat_type']."</a></td><td><a href='arxivclient.php?pid=".$mdb['id']."'>".convdate($mdb['date'])."</a></td><td><a href='arxivclient.php?pid=".$mdb['id']."'>".$mdb['t_pul']."</a></td><td><a href='arxivclient.php?pid=".$mdb['id']."'>".$mdb['plastik']."</a></td><td><a href='arxivclient.php?pid=".$mdb['id']."'>".$mdb['naqt']."</a></td><td><a href='arxivclient.php?pid=".$mdb['id']."'>".$mdb['qarz']."</a></td><td><a href='kassa.php?did=".$mdb['id']."'><img src='images/x.png' width=20></a></td></tr>";

}
else
{
	echo"<tr";
if ($mdb['t_pul']==0) echo " bgcolor='#FFFF99'";
if ($mdb['qarz']!=0) echo " bgcolor='#Fcf'";

echo "><td align='center'><a href='arxivclient.php?id=".$mdb['id']."'><b>".$mdb['navbat']."</b></a></td><td><a href='arxivclient.php?id=".$mdb['id']."'>".$mdb['fio']."</a>$td</td><td><a href='arxivclient.php?id=".$mdb['id']."'>".$mdb['passport']."</a></td><td><a href='arxivclient.php?id=".$mdb['id']."'>".$mddb['fio']."</a></td><td><a href='arxivclient.php?id=".$mdb['id']."'>".$mxdb['xizmat_name']."</a></td><td><a href='arxivclient.php?id=".$mdb['id']."'>".$mdb['xizmat_type']."</a></td><td><a href='arxivclient.php?id=".$mdb['id']."'>".convdate($mdb['date'])."</a></td><td><a href='arxivclient.php?id=".$mdb['id']."'>".$mdb['t_pul']."</a></td><td><a href='arxivclient.php?id=".$mdb['id']."'>".$mdb['plastik']."</a></td><td><a href='arxivclient.php?id=".$mdb['id']."'>".$mdb['naqt']."</a></td><td><a href='arxivclient.php?id=".$mdb['id']."'>".$mdb['qarz']."</a></td><td><a href='kassa.php?did=".$mdb['id']."'><img src='images/x.png' width=20></a></td></tr>";

}
 
$pt=$pt+$mdb['t_pul'];
$pp=$pp+$mdb['plastik'];
$pn=$pn+$mdb['naqt'];
if ( ($mdb['t_pul']!=0) and ($mdb['qarz']!=0)) $pq=$pq+$mdb['qarz'];
	  
}
?>
<tr><td colspan="2" align="center" style="font-size:20px;"><strong>Jami:</strong> </td><td colspan="10"><strong style="color:#00F">To'langan pul: <?php echo $pt; ?></strong><br />
<strong style="color:#0F0">Plastikda: <?php echo $pp; ?></strong><br />
<strong style="color:#F0F">Naqtda: <?php echo $pn; ?></strong><br />
<strong style="color:#300">Qarz: <?php echo $pq; ?></strong><br />
<strong style="color:#006464">Umumiy summa:  <?php $pu=$pt+$pq; echo $pu; ?></strong></td></tr>
</table>
<?php
}
   }
?>
</div>
</body>
</html>