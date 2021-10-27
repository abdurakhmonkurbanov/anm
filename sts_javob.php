<?php 
include("data/db.php");
	  mysql_query("SET NAMES cp1251");
?>
<!DOCTYPE html>
<html class=""><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <title>Astro Neyromed</title>

    <link rel="shortcut icon" href="http://meddatademo.bepro.uz/Content/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://meddatademo.bepro.uz/Content/images/favicon.ico" type="image/x-icon">
    <script src="date/datetimepicker_css.js"></script>

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
<style type="text/css">
@media screen {
     
      
      #content {
            
            font-size: 15px;
			 color: #000000;
			 margin-left:20px;
      }
	  #leftcolumn {
            
           
            font-size: 15px;
      }
      
}

@media print {
      
      #content{
           
         
            font-size: 15px;
            color: #000000;
            margin-left:20px;
      }
	   #leftcolumn {
            display: none;
      }
     
}


</style>

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
<a href="index.php">Главная</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a><strong>Starsionar davolanish</strong></a>
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
            </ul> 
             
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
admin
                            <i class="icon-angle-down "></i>
                        </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Профиль </a></li>
                        <li id="Dashboard">
<a href="#">Администрирование</a>
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
        <a href="http://meddatademo.bepro.uz/ru-RU/Cashbox/Payment#" class="dropdown-toggle" data-toggle="dropdown">
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

    <div class="container-fluid main-container">
        <table width="80%" bordercolor="#3366FF" align="center" border="2">
    <tr><td>
<?php

if ($_SESSION['type']==6)
{
	 
	$pid=$_SESSION['pid'];
    $dbm=mysql_query("select * from `sts_main` where `id` = '$pid'");
	$mdbm=mysql_fetch_array($dbm);
	$gch=$mdbm['gacha'];
	$day1=$mdbm['date'];
	 $kun=sana($day1,$gch); 
	 
		$xid=$mdbm['xona_id'];
		$dbx=mysql_query("select * from `sts_xona` where `id` = '$xid'");
		$mdbx=mysql_fetch_array($dbx);
		?>
        <h2 align="center">Aylanma varaqa</h2>
        FIO: <strong><?php echo $mdbm['fio']; ?></strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Passport S/R <strong><?php echo $mdbm['passport']; ?></strong> <br>
        Davolangan vaqti <strong><?php echo convdate($mdbm['date']); ?></strong> dan &nbsp; &nbsp; &nbsp;<strong> <?php echo convdate($mdbm['gacha']); ?></strong> gacha<br>
		Davolangan xonasi <strong><?php echo $mdbx['number'] ?>-xona</strong> &nbsp; &nbsp;  &nbsp; xona narxi  <strong><?php echo $mdbx['price'] ?></strong> 
         <table style="margin-top:30px" align="center" width="100%" border="1">
    <tr align="center" bgcolor="#A2FDA2"><td align="center" width="55%"> <strong>Xizmat nomi</strong></td><td width="15%"><strong>To'lanilishi zarur pul</strong></td><td width="15%"><strong>To'lanilgan pul</strong></td><td width="15%"><strong>Sana</strong> </td>
    </tr>
 <tr align="center" bgcolor="#FFD9EC"><td align="left"><strong>Xona uchun to'lov</strong></td><td><?php $xut=$mdbx['price']*$kun; echo $xut; ?></td><td>0</td><td><?php echo convdate($day1); ?></td></tr>
    <?php
	$s=$mdbm['history'];
	$arr1=explode(" ",$s);
	$tz=0;
	$tp=0;
	$i=1;
	while ($arr1[$i]!="")
		{	
		$s1=$arr1[$i];
		$arr2=explode(":",$s1);
		if ($arr2[0]==0)
			{
				echo "<tr><td align='center'><strong>Pul to`langan</strong></td><td align='center'><strong>&nbsp; </strong></td><td align='center'><strong>".$arr2[2]."</strong></td><td align='center'><strong>".convdate($arr2[3])."</strong></td></tr>";
				$tp=$tp+$arr2[2];
			}
		else
			{
				$s2=$arr2[0];
				$arr3=explode("_",$s2);
				$xid=$arr3[0];
				$xdb=mysql_query("select * from `xizmatlar` where `id` = '$xid'");
				$mxdb=mysql_fetch_array($xdb);
				echo "<tr><td><strong>".$mxdb['xizmat_name']."</strong> (";
				$k=1;
				while($arr3[$k]!="")
					{
						$xtid=$arr3[$k];
						$xtdb=mysql_query("select * from `xizmat_type` where `id` = '$xtid'");
						$mxtdb=mysql_fetch_array($xtdb);
						echo $mxtdb['xizmat_type'].", ";
						$k++;
					}
				echo") </td><td>".$arr2[1]."</td><td>".$arr2[2]."</td><td>".convdate($arr2[3])."</td></tr>";
				$tz=$tz+$arr2[1];
				
			}
		$i++;
		}
	$j1=$tz+$xut;
	$qarz=$j1-$tp;
 echo "<tr  align='center' bgcolor='#C4E1FF'><td align='center'> Jami </td><td>".$j1."</td><td>".$tp."</td><td>".$qarz." (qarz)</td></tr>";
	?>
    </table>
    </tr>
    </table>
        
        <?php
 	if($_POST['javob']!='ok')
	{
		 
		if($_SESSION['a']!=1)
		{
		?>
 <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
 <input type="hidden" name="javob" value="ok">
 <center>   <input type="submit" class="form-control-small" value="Bemorga javob berish "> </center>

 </form>
		<?php
		}
	}
	if($_POST['javob']=="ok") /////  Javob berish
	{
	 
		mysql_query("update `sts_main` set `check` = 1 where `id` = '$pid'");
		$pdb=mysql_query("select * from `sts_main` where `id` = '$pid'");
		$mpdb=mysql_fetch_array($pdb);
		$xid=$mpdb['xona_id'];
		$xdb=mysql_query("select * from `sts_xona` where `id` = '$xid'");
		$mdbx=mysql_fetch_array($xdb);
		$xk=$mdbx['kasal'];
		$xk--;
		mysql_query("update `sts_xona` set `kasal` = '$xk' where `id`= '$xid'");
	}	
?><br>

<center><a class="form-control-small" href="javascript:window.print() ">Chop etish</a></center>
<?php	 
}

 else
   {
	echo "Hurmatli foydalanuvchi siz Kassir emassiz. <a href='index.php'>Qaytish</a> ";   
	   
   }
?>
</td></tr></table>
<?php

?>
        </div>
    </div>
</div>

      <script language="JavaScript">
function  freeq()
{
	q_input.disabled=!avv_qarz.checked;	
	q_input.value=avvqarz1.value;
	
}
function free1()
{
pl_input.disabled=!cash_pl.checked;	
pl_input.value=qarz.value;
qarz.value=0;
}

function free2()
{
nq_input.disabled=!cash_nq.checked;	
nq_input.value=qarz.value;
qarz.value=0;
}

function pl()
{
qarz.value=pul.value-pl_input.value;	
pul.value=qarz.value;	
}

function nq()
{
qarz.value=pul.value-nq_input.value;	
pul.value=qarz.value;	
}

</script>   

        
    </div>
    <script src="style/jquery-1.11.1.js"></script>
 

    <script src="style/jquery.fileDownload.js"></script>
    <script src="style/bootstrap.min.js"></script>
     </body></html>