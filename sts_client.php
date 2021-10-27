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
<a href="sts_main.php"><strong><< Orqaga</strong></a>
                </li>
            </ul> 
             <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a><strong> &nbsp; &nbsp; </span></strong></a>
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
     <?php
	 if ($_SESSION['type']==6)
{
	
	if(!empty($_POST['raq']))	///   Xizmatlarni saqlash 
	{
		$pid=$_SESSION['pid'];
		$raq=$_POST['raq'];
		$dop=$_POST['dop'];
		$tpul=$_POST['pm'];
		$xiz_name=$_POST['xiz_name'];
		$xdbb=mysql_query("select * from `xizmatlar` where `id` = '$xiz_name'");
		$mxdbb=mysql_fetch_array($xdbb);
		$xiz_name=$mxdbb['xizmat_name'];
		$k=0;
		$rr="";	$jj=0;
		$his=$mxdbb['id'];
		$nowx="";
		while ($raq>=$k)
		{
			$arr[$k]=$_POST['na'.$k];
				if ($arr[$k]!="")
				{
					 
							$rr=$rr.$arr[$k].": ";
							$his=$his."_".$arr[$k];
							
				}
					$k=$k+1;
		}
		$xx=$rr;   ///   Xozir berilgan zakazlarni saqlash
		$his=$his.":".$tpul.":0:".$day;
		 
		$db1=mysql_query("select * from `sts_main` where `id` = '$pid'");
		$mdb1=mysql_fetch_array($db1);
		$rr=$rr.$mdb1['xiz_name_type_id'];
		$qarz=$mdb1['qarz'];
		$his=$mdb1['history']." ".$his;
											//$exx=$mdb1['xiz_name_type_id'];
											//$exxs=explode(":",$exx);
		
		$qarz=$qarz+$tpul;
		 
		mysql_query("update `sts_main` set `xiz_name_type_id` = '$rr', `qarz` = '$qarz', `history` = '$his' where `id` = '$pid'");
////////////////////////////////////////////
			
			$xxs=explode(":",$xx);
			$i=0;
			$xx2="";
			while($xxs[$i]!="")
			{
				$xid=$xxs[$i];
			 $x=mysql_query("select * from `xizmat_type` where `id` = '$xid'");
			 $x1=mysql_fetch_array($x);
			 $xx2=$xx2.$x1['xizmat_type'].", ";
			$i++;
			}
			
			$xiz_id=$x1['xiz_name_id'];
			$xdb=mysql_query("select * from `xizmatlar` where `id` = '$xiz_id'");
			$mxdb=mysql_fetch_array($xdb);
	
			$doc_id=$mdb1['d_id'];
			$ddb=mysql_query("select * from `doctors` where `id` = '$doc_id'");
			$mddb=mysql_fetch_array($ddb);
	
	?>
	 <table width="100%" border="0" style="margin-left:5px;" with=10%><tr><td width="10%" id="content">
<span style="font-size:16px;">
 <div  align=center><font color='#F0F' size='4px'><b>Astro Neyromed</b></font></div>
  <div>FIO: <b><?php echo($mdb1['fio']);?></b></div></font>
    <div>Tug'ilgan yili: <b><?php echo($mdb1['ty']);?></b></div></font>
  <div>Xizmat: <b><?php echo $xiz_name;?></b></div> 
<div>Tekshirishlar: <b><?php echo $xx2;?></b></div>  
<div><u><b>Xona: <?php echo($mddb['fio']);?></b></u></div> 
 <div>To'langan pul: <b><?php echo $tpul;?></b></div> 
 <div>Sana: <b><?php echo $dayn."<br>Vaqt: ".$timn;?></b></div>  </span>
  </td></tr>
  <tr><td id="leftcolumn">
  <a href="sts_client.php?pid=<?php echo $pid;  ?>">Orqaga</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:window.print() ">Chop etish</a>
</td></tr>
  </table>
		<?php 
	}
	if (($_GET['pid']!="") or ($_POST['pid']!=""))			/// Birinchi oyna
	{
		if ($_GET['pid']!="")	$pid=$_GET['pid'];
		if ($_POST['pid']!="")	$pid=$_POST['pid'];
		$_SESSION['pid']=$pid;
		$pdb=mysql_query("select * from `sts_main` where `id` = '$pid'");
		$mpdb=mysql_fetch_array($pdb);
		
	 ?>  
    <table style="margin-top:50px" align="center" width="80%" border="1">
    <tr><td> <div  style="margin-left:20px; margin-right:20px">
FIO: <b><?php  echo $mpdb['fio']; ?> </b>&nbsp; &nbsp; &nbsp; &nbsp; Qarzi: <b> <?php  echo $mpdb['qarz']; ?></b> <br>
		Passport S/N <b> <?php  echo $mpdb['passport']; ?></b> &nbsp; &nbsp; &nbsp; &nbsp; mijozning tugash muddati: <b> <?php  echo convdate($mpdb['gacha']); ?></b><br> 
        
       
        <div class="input-group">
            <br> 
            <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
            &nbsp; &nbsp; &nbsp; &nbsp;    <strong>Qarzni to'lash</strong>:  <input type="text" class="k-form-text-row" id="qarz" name="qarz"  style="margin-left:30px;" value="<?php echo $mpdb['qarz'];  ?>">   &nbsp;
			<br>
<input type="hidden" name="pul" id="pul" value="<?php echo $mpdb['qarz'];  ?>">
<input type="hidden" name="id" id="id" value="<?php echo $id;  ?>">
				<label  style="margin-left:30px; margin-top:10px">
        <input type="checkbox" name="plastik"  onclick="free1()" value="1" id="cash_pl"> &nbsp;<strong>Plastik</strong> </label> 
       <input type="text" class="k-form-text-row" id="pl_input"   disabled  style="margin-left:30px;" value="" onChange="pl()" name="plastik"> <br>
     <label  style="margin-left:30px; margin-top:10px">	<input type="checkbox"  onclick="free2()"  name="naqt" value="1" id="cash_nq">	&nbsp;<strong>Naqt</strong>	
                </label>     <input type="text" class="k-form-text-row" disabled name="naqt" onChange="nq()" id="nq_input"  style="margin-left:30px;" value="">            
               <br>

 <input type="submit" style="margin-left:30px; margin-top:10px; margin-bottom:10px; font:bold;"  class="form-control" value="saqlash" id="submit_button" /><br>

            </div>
       </form>
       <?php
	   if($_GET['a']==1)
	   {
		     $_SESSION['a']=1;
			 
	   }
	   if($_GET['a']!=1)
	   {
		   $_SESSION['a']=0;
		 
		   
	   ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
      

		<hr style="border-color:#00C; margin-top:20px"/>    
        Kunni uzaytirish <input type="date"  style="padding-top:0px" class="form-control-small" name="kun"> 
        <input type="submit" class="form-control-small" value="HA"><br>
 </form>
 <hr style="border-color:#00C; margin-top:10px"/>    
		<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
     Bemor xizmatlardan foydalanmoqchi: <select  class="form-control-small"   name="xizname" id="select">
              <option value="0"><strong>Xizmatlar turlari</strong></option>
              
			<?php $dat=mysql_query("select * from `xizmatlar`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option value='".$myr['id']."'>";  echo($myr['xizmat_name']);echo"</option>";

			}  ?>
              </select>&nbsp; &nbsp;         <input type="submit" class="form-control-small" value="Keyingi >>">
        </form>
        <?php
	   }
		?>
        <hr style="border-color:#00C; margin-top:10px"/>    

<form action="sts_javob.php" method="post">
 <input type="submit" class="form-control-small" value="Aylanma varaqa">
        </form>
        </div>
</td></tr></table>
<?php
	}
	if ($_POST['kun']!="")    ///////  Sana o'zgartirildi
	{
		$pid=$_SESSION['pid'];
		$gacha=$_POST['kun']; 
				echo "<br><br>";
				$kdb=mysql_query("select * from `sts_main` where `id` = '$pid'");
				$mkdb=mysql_fetch_array($kdb);
				$xid=$mkdb['xona_id'];
				$xdb=mysql_query("select * from `sts_xona` where `id` = '$xid'");
				$mxdb=mysql_fetch_array($xdb);
				$xn=$mxdb['price'];
				$day=$mkdb['gacha'];
				$qarz=$mkdb['qarz']; 
				 $kun=sana($day,$gacha);  
				  $qarz=$qarz+$xn*$kun;
				 
				mysql_query("UPDATE `sts_main` SET `gacha` = '$gacha', `qarz` = '$qarz' WHERE `id` = '$pid' LIMIT 1;")	;
				
				echo " Sana o`zgartirildi! <a href='sts_client.php?pid=$pid'>Qaytish</a>";
	}	
	
	if($_POST['qarz']!="")   /// Qarzni to'lash
	{
		$id=$_SESSION['pid'];
		 $qarz=$_POST['qarz'];
	 $naqt=$_POST['naqt'];
	 $plastik=$_POST['plastik'];
	 if($naqt==""){ $naqt=0;}
	 if($plastik=="") $plastik=0;
	 $tp1=$naqt+$plastik;
	 $epdb=mysql_query("select * from `sts_main` where `id`= '$id'");
	 $mepdb=mysql_fetch_array($epdb);
	 $plastik=$plastik+$mepdb['plastik'];
	 $naqt=$naqt+$mepdb['naqt'];
	 $tp=$naqt+$plastik;
	 $hist=$mepdb['history'];
	 $hist=$hist." "."0:$tp1:$tp1:$day";
	 mysql_query("UPDATE `sts_main` SET `t_pul` = '$tp', `plastik` = '$plastik', `naqt` = '$naqt', `qarz` = '$qarz', `history` = '$hist' WHERE `id` = '$id' LIMIT 1;");
		echo "<br><br>Pul to`landi!  <a href='sts_client.php?pid=$id'>Qaytish</a>";
		
	}
	
	if($_POST['xizname']!="")   //// xizmatlardan foydalanish
	{
		$num=$_POST['xizname'];
		$pid=$_SESSION['pid'];
		$db1=mysql_query("select * from `sts_main` where `id` = '$pid'");
		$mdb1=mysql_fetch_array($db1);
		$db2=mysql_query("select * from `xizmatlar` where `id` = '$num'");
		$mdb2=mysql_fetch_array($db2);
		?>
        <div style="margin-left:50px; margin-top:30px">FIO: <b><?php echo $mdb1['fio']; ?></b> &nbsp; &nbsp; &nbsp; &nbsp; Tanlangan xizmat: <b><?php echo $mdb2['xizmat_name']; ?></b></div>
 <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
 <table style="margin-top:20px" align="center" width="80%" border="1">
  <?php 
  $xizname_id=$mdb2['id'];
  $dat1=mysql_query("SELECT *  FROM `xizmat_type` WHERE `xiz_name_id` = '$num' ORDER BY `xizmat_type` ASC");
  $raq=mysql_num_rows($dat1);
  $i=1;
  while ($myr1=mysql_fetch_array($dat1))
  {  
  $s=($myr1['id']);
  $s1=$myr1['xizmat_type'];
  $narr=($myr1['narxi']);
   echo"<tr><td> <label> &nbsp; <input type=checkbox onclick=tp$i($narr)  name='na$i'  value='$s'  id=xizmattype> &nbsp; <b>$s1</b>  </label> </td><td>";
   echo($myr1['narxi']);
   echo "</td></tr>";
   $i=$i+1;
  }  
  ?>
    
<tr><td colspan="2" align="center">
<input type="hidden" name="raq" value="<?php echo($raq); ?>">
<input type="hidden" name="xiz_name" value="<?php echo $mdb2['id']; ?>">
<span style="float:left; margin:10px"> <b>To'lanilishi zarur pul:
<input style="background:#00F; color:#FFF; border:medium;" value="0" size="10" id="pm_input" type="text" name="pm" readonly />  </b></span>
 <input type="submit" style=" width:300px; height:40px;  margin:10px;"  class="form-control-small1" value="saqlash" id="submit_button" />
</td></tr>
</table> 
</form>
         
        <?php
		
	}
}
else
   {
	echo "Hurmatli foydalanuvchi siz Kassir emassiz. <a href='index.php'>Qaytish</a> ";   
	   
   }

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

 <script language="JavaScript">


<?php 
  $dat1=mysql_query("SELECT *  FROM `xizmat_type` WHERE `xiz_name_id` = '$num'");
  $raq=mysql_num_rows($dat1);
  $i=0;
  while ($myr1=mysql_fetch_array($dat1))
  {  
  $narr=($myr1['narxi']);
  $i=$i+1;
 ?> 
 function tp<?php echo($i);?>(i)
 {
	  var form0=document.forms[0];
	  var form1=document.forms[0];
	  var pmm=form0.elements.pm;
      var ch=form1.elements.na<?php echo($i);?>;
	   
	   if(ch.checked)
	   {
		pmm.value=pmm.value-(-1)*i;    
	   }
	   else
	   {
		pmm.value=pmm.value-i; 
	   }
	
 }
 
 <?php
	 }  
  ?>  
 

 
 </script>



        

        
    </div>
    <script src="style/jquery-1.11.1.js"></script>
 

    <script src="style/jquery.fileDownload.js"></script>
    <script src="style/bootstrap.min.js"></script>
     </body></html>