<?php 
include("data/db.php");
	  mysql_query("SET NAMES cp1251");
?>
<!DOCTYPE html>
<html class=""><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <title>Registration Astro Neyromed</title>

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
            
            <a class="navbar-brand" href="index.php">
            <br>
 <div class="hospital-name"><img src="./images/meddata_ico.png" width="32">  Astro Neyromed    </div>
            </a>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li id="Reporting">
<a href="reg.php"><strong>Yangilash</strong></a>
                </li>
            </ul> 
            <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a><strong>Registratsiya bo'limi</strong></a>
                </li>
            </ul> 
    <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a><strong> <span style="float:right">To'lanilishi zarur pul: <b> <form><input disabled style="background:#00F; border:medium;" value="0" size="10" id="pm_input" type="text" name="pm" /> </form> </b>&nbsp; &nbsp; </span></strong></a>
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
        
<br>
   <?php
   if($_SESSION['type']==3)
   {
	   if (empty($_POST['next']))
	   {
		   include("data/regform.php");
	   }
	   if (!empty($_POST['next']))
	   {
   		   include("data/saqlash.php");
	   }
		////////////////////////////////////////  Bazaga yozishni shu yerga ko'chirdim
		if(!empty($_POST['ok']))
		{
		$fio=$_POST['fio'];
		$ty=$_POST['ty'];
		$manzil=$_POST['manzil'];
		$passp=$_POST['passport'];
		$xizname_id=$_POST['xizname'];	
		$raq2=$_POST['raq'];
		$dname=$_POST['dname'];
		$tashdoctor=$_POST['tashdoktor'];
		$k=0;
		$rr="";	$jj=0;
		while ($raq2>=$k)
		{
			$arr[$k]=$_POST['na'.$k];
			$addd[$k]=$_POST['add'.$k];
			$nnar[$k]=$_POST['nar'.$k];
				if ($arr[$k]!="")
				{
					if($xizname_id==11) 
						{ 
							$rr=$rr.$arr[$k]."($addd[$k]-kunlik), ";
							$jj=$jj+(int)$nnar[$k]*$addd[$k];
						}
					else 
						{
							$rr=$rr.$arr[$k].", ";
							$jj=$jj+(int)$nnar[$k];
						}
				}
					$k=$k+1;
				}
			$y=1;
			$xtype="";
			while ($raq2>=$y)
				{
					$xtype=$xtype+$b[$y];
					$y=$y+1;
				}
		$dat3=mysql_query("SELECT *  FROM `doctors` WHERE `id` = '$dname'");
		$myr3=mysql_fetch_array($dat3);;
		$nav=$myr3['oxir_num'];
		$nav=$nav+1;
		$tim=date("G:i");               ////////////////////
		if ($dname=="") {  echo" Kechirasiz siz doktorni tanlamadingiz! &nbsp;&nbsp;&nbsp;<a href=reg.php>Asosiy panelga o`tish</a>"; exit();}	
	/////  Yozishni boshlash
	$dop=$_POST['dop'];
	$dopp=$_POST['dopp'];
	if(($dop!="") and ($dopp!="")) { $rr=$dop; $jj=$dopp; }
		$res=mysql_query("INSERT INTO `client` (`id`, `fio`, `passport`, `xiz_name`, `doctors`, `navbat`, `xizmat_type`, `t_y`, `manzil`, `tash_doctor_id`, `t_pul`, `plastik`, `naqt`,`qarz`, `date`, `time`) VALUES (NULL, '$fio', '$passp', '$xizname_id', '$dname', '$nav', '$rr','$ty', '$manzil', '$tashdoctor', '0', '0', '0', '$jj', '$da', '$tim');"); 
////////////////////////  Historyni o'zgartirish
$maxdb=mysql_query("select max(id) from `client`");
$mmaxdb=mysql_fetch_array($maxdb);
$maxc_id=$mmaxdb['max(id)'];

$yadb=mysql_query("select * from `client` where `id` = '$maxc_id'");
$myadb=mysql_fetch_array($yadb);

$hdb=mysql_query("select * from `history` where `passport` like '$passp'");
$mhdb=mysql_fetch_array($hdb);

	if ($mhdb['passport']!="")	/////////  Client avval ro'yxatdan o'tgan bo'sa
		{
			
			$xizname_id1=$mhdb['xiz_name'].": ".$myadb['xiz_name'];
			$dname1=$mhdb['doctors'].": ".$myadb['doctors'];
			$rr1=$mhdb['xizmat_type'].": ".$myadb['xizmat_type'];
			$tashdoctor1=$mhdb['tash_doctor_id'].": ".$myadb['tash_doctor_id'];
			$da1=$mhdb['date'].": ".$myadb['date'];
			$tim1=$mhdb['time'].": ".$myadb['time'];
			$h_id=$mhdb['id'];			 
			mysql_query("UPDATE `history` SET `xiz_name` = '$xizname_id1', `doctors` = '$dname1', `xizmat_type` = '$rr1', `tash_doctor_id` = '$tashdoctor1', `date` = '$da1', `time` = '$tim1' WHERE `id` = '$h_id' LIMIT 1;");
		}
	else						/////////  Client yangi  bo'sa
		{
			if($passp!="")
			{
			mysql_query("INSERT INTO `history` (`id`, `fio`, `passport`, `xiz_name`, `doctors`, `xizmat_type`, `t_y`, `manzil`, `tash_doctor_id`, `date`, `time`) VALUES (NULL, '$fio', '$passp', '$xizname_id', '$dname', '$rr', '$ty', '$manzil', '$tashdoctor', '$da', '$tim');");
			}
			else
			{
				echo "Bu mijozning passport raqami kiritilmaganligi sababli karta ochilamdi";	
			}
		}

/////////////////////////  Historiy tugadi		
////  Bazaga yozish tugadi
		  $da3=mysql_query("SELECT *  FROM `doctors` WHERE `id` = '$dname'");
       	  $my3=mysql_fetch_array($da3);
		  $did=$my3['id'];
		 $updoc=mysql_query("UPDATE  `doctors` SET `oxir_num` = '$nav' WHERE `id` = '$did' LIMIT 1");
		?>
<h3><div align="center" class="title1">Malumotlar saqlandi! &nbsp; &nbsp; &nbsp; &nbsp;   </div></h3>
        <?php
		
		}
		////////////////////////////////////////  Bazaga yozishni shu yerga ko'chirdim
   include("data/list.php");
   }
   else
   {
	echo "Hurmatli foydalanuvchi siz registrator emassiz. <a href='index.php'>Qaytish</a> ";   
	   
   }
   ?>
     <script src="style/jquery-1.11.1.js"></script>
    <script src="style/jquery.fileDownload.js"></script>
    <script src="style/bootstrap.min.js"></script>
     </body></html>