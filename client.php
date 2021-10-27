<?php 
include("data/db.php");
	  mysql_query("SET NAMES cp1251");
?>
<!DOCTYPE html>
<html class=""><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    
    <meta name="accept-language" content="ru-RU">
    <title>Client</title>

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
<body>

<?php
if($_SESSION['type']==2)      /// Asosiy
   {
	if ($_GET['pid']!="")
	{
	$pid=$_GET['pid'];
	$cdb=mysql_query("select * from `client` where `id` = '$pid'");
	$mdb=mysql_fetch_array($cdb);
	
	$xiz_id=$mdb['xiz_name'];
	$xdb=mysql_query("select * from `xizmatlar` where `id` = '$xiz_id'");
	$mxdb=mysql_fetch_array($xdb);
	
	$doc_id=$mdb['doctors'];
	$ddb=mysql_query("select * from `doctors` where `id` = '$doc_id'");
	$mddb=mysql_fetch_array($ddb);
	?>
	 <table width="100%" border="0" style="margin-left:7px;" with=10%><tr><td width="10%" id="content">
 <span style="font-size:16px;">
 <div  align=center><font color='#F0F' size='4px'><b>Astro Neyromed</b></font></div>
  <div>FIO: <b><?php echo($mdb['fio']);?></b></div></font>
  <div>Tug'ilgan yili: <b><?php echo($mdb['t_y']);?></b></div></font>
  <div>Xizmat: <b><?php echo($mxdb['xizmat_name']);?></b></div> 
<div>Tekshirishlar: <b><?php echo($mdb['xizmat_type']);?></b></div>  
<div><u><b>Xona: <?php echo($mddb['fio']);?></b></u></div> 
 <center><font size=5><div>Navbat: <b><?php echo($mdb['navbat']);?></b></div></font></center>
 <div>To'langan pul: <b><?php echo($mdb['t_pul']);?></b></div>      
 <div>Sana: <b><?php echo(dateconv($mdb['date'])."<br>Vaqt: ");  echo($mdb['time']);?></b></div>  </span>
  </td></tr>
  <tr><td id="leftcolumn">
  <a href="kassa.php">Orqaga</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:window.print() ">Chop etish</a>
</td></tr>
  </table>
	 <?php

}
if($_POST['id']!="")
 {
	 $id=$_POST['id'];
	 $qarz=$_POST['qarz'];
	 $naqt=$_POST['naqt'];
	 $plastik=$_POST['plastik'];
	 $oq=$_POST['oq'];
	 if($naqt==""){ $naqt=0;}
	 if($plastik=="") $plastik=0;
	 
	 $epdb=mysql_query("select * from `client` where `id`= '$id'");
	 $mepdb=mysql_fetch_array($epdb);
	 $plastik=$plastik+$mepdb['plastik'];
	 $naqt=$naqt+$mepdb['naqt'];
	 $tp=$naqt+$plastik;
 	if($oq==1) mysql_query("UPDATE `client` SET `check` = '1' WHERE `id` = '$id' LIMIT 1;");
	mysql_query("UPDATE `client` SET `t_pul` = '$tp', `plastik` = '$plastik', `naqt` = '$naqt', `qarz` = '$qarz' WHERE `id` = '$id' LIMIT 1;");

	
	$cdb=mysql_query("select * from `client` where `id` = '$id'");
	$mdb=mysql_fetch_array($cdb);
	
	$xiz_id=$mdb['xiz_name'];
	$xdb=mysql_query("select * from `xizmatlar` where `id` = '$xiz_id'");
	$mxdb=mysql_fetch_array($xdb);
	
	$doc_id=$mdb['doctors'];
	$ddb=mysql_query("select * from `doctors` where `id` = '$doc_id'");
	$mddb=mysql_fetch_array($ddb);
	
	?>
	 <table width="100%" border="0" style="margin-left:5px;" with=10%><tr><td width="10%" id="content">
<span style="font-size:16px;">
 <div  align=center><font color='#F0F' size='4px'><b>Astro Neyromed</b></font></div>
  <div>FIO: <b><?php echo($mdb['fio']);?></b></div></font>
    <div>Tug'ilgan yili: <b><?php echo($mdb['t_y']);?></b></div></font>
  <div>Xizmat: <b><?php echo($mxdb['xizmat_name']);?></b></div> 
<div>Tekshirishlar: <b><?php echo($mdb['xizmat_type']);?></b></div>  
<div><u><b>Xona: <?php echo($mddb['fio']);?></b></u></div> 
 <center><font size=5><div>Navbat: <b><?php echo($mdb['navbat']);?></b></div></font></center>
 <div>To'langan pul: <b><?php echo($mdb['t_pul']);?></b></div>      
 <div>Sana: <b><?php echo(dateconv($mdb['date'])."<br>Vaqt: ");  echo($mdb['time']);?></b></div>  </span>
  </td></tr>
  <tr><td id="leftcolumn">
  <a href="kassa.php">Orqaga</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:window.print() ">Chop etish</a>
</td></tr>
  </table>
	 <?php
 }
 else 
 {


?>

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
<a href="kassa.php"><strong>Yangilash</strong></a>
                </li>
            </ul> 
            <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a><strong>Kassa bo'limi</strong></a>
                </li>
            </ul>
             <ul class="nav navbar-nav">

                <li id="Reporting">
<a href="arxiv.php"><strong>Arxiv</strong></a>
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
        

<p>&nbsp;</p><br>
<br>
<div class="row">
 <?php
 /////////////////  Saqlash boshlandi
 
 ///////////////////////  Saqlash  tugadi
 
if($_GET['id']!="")
{
 $id=$_GET['id'];
 ////////////////////////////////////
 $db1=mysql_query("select * from `client` where `id` = '$id'");
 $mdb1=mysql_fetch_array($db1);
 
 
 
 	$xiz_id=$mdb1['xiz_name'];
	$xdb=mysql_query("select * from `xizmatlar` where `id` = '$xiz_id'");
	$mxdb=mysql_fetch_array($xdb);
	
	$doc_id=$mdb1['doctors'];
	$ddb=mysql_query("select * from `doctors` where `id` = '$doc_id'");
	$mddb=mysql_fetch_array($ddb);
	
	$tdoc_id=$mdb1['tash_doctor_id'];
	$tddb=mysql_query("select * from `tashqidoktor` where `id` = '$tdoc_id'");
	$mtddb=mysql_fetch_array($tddb);
		
 ?>
 <table width="90%" bordercolor="#3366FF" align="center" border="2"><tr>
 <td>FIO: <b><?php echo $mdb1['fio']; ?></b><br>
Passport seriya va raqam: <b><?php  echo $mdb1['passport']; ?></b><br>
Manzil:   <b><?php  echo $mdb1['manzil']; ?></b><br>
Tug'ilgan yili:  <b><?php  echo $mdb1['t_y']; ?></b><br>

</td>
<td>
Tanlangan doktor:  <b><?php  echo $mxdb['xizmat_name']; ?></b> <br>
Tanlangan xizmat:    <b><?php  echo $mddb['fio']; ?></b><br>
Ko'rzatiladigan xizmat turi:   <b><?php  echo $mdb1['xizmat_type']; ?></b><br>
 Yo'llanma bergan doktor (Agar bor bo'lsa): <b><?php  echo $mtddb['fio']; ?></b>  <br>
</td>
</tr> 
<tr><td colspan="2">

To'lanishi zarur bo'lgan pul miqdori: <b><?php echo $mdb1['qarz']; ?></b>
 
<?php
$passp=$mdb1['passport'];
if ($passp!="")
 {
 	$b=1;
	$avdb=mysql_query("select * from `client` where `passport` like '$passp'");
	 while($mavdb=mysql_fetch_array($avdb))
	 {
	 if($mavdb['fio']!="")	//  Avval kelgan
 		{
			if($b==1) { echo "<br>Bu mijoz <b>". convdate($mavdb['date'])."</b> da bizdan ro`yxatdan o`tgan<br>";}
			$b=2;
			 if (($mavdb['t_pul']!=0) and ($mavdb['qarz']!=0))
			 {
			 	echo "Bu mijozning ".convdate($mavdb['date'])." da ".$mavdb['qarz']." so`m qarzi bor <br>";
			 }
 		}
	 }
 }
 

?>
 <form action="<?php  echo $_SERVER['PHP_SELF'];  ?>" method="post"  id="regfrm">
            <div class="input-group">
            <br>
            &nbsp; &nbsp; &nbsp; &nbsp;    <strong>Qarz</strong>:  <input type="text" class="k-form-text-row" id="qarz" name="qarz"  style="margin-left:30px;" value="<?php echo $mdb1['qarz'];  ?>">   &nbsp;
			<br>
<input type="hidden" name="pul" id="pul" value="<?php echo $mdb1['qarz'];  ?>">
<input type="hidden" name="id" id="id" value="<?php echo $id;  ?>">
				<label  style="margin-left:30px; margin-top:10px">
        <input type="checkbox" name="plastik"  onclick="free1()" value="1" id="cash_pl"> &nbsp;<strong>Plastik</strong> </label> 
       <input type="text" class="k-form-text-row" id="pl_input"   disabled  style="margin-left:30px;" value="" onChange="pl()" name="plastik"> <br>
     <label  style="margin-left:30px; margin-top:10px">	<input type="checkbox"  onclick="free2()"  name="naqt" value="1" id="cash_nq">	&nbsp;<strong>Naqt</strong>	
                </label>     <input type="text" class="k-form-text-row" disabled name="naqt" onChange="nq()" id="nq_input"  style="margin-left:30px;" value="">            
               <br>
<label  style="margin-left:30px; margin-top:10px">	<input type="checkbox"  name="oq" value="1">	&nbsp;<strong>Kassa aparatdan o`tgazish</strong>	
                </label> <br>

 <input type="submit" style="margin-left:30px; margin-top:10px; margin-bottom:10px; font:bold;"  class="form-control" value="saqlash" id="submit_button" /><br>

            </div>
            </form>
<script type="text/javascript"><!--
			if(typeof regfrm == 'undefined') regfrm = document.getElementById('regfrm');
			//--></script>
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

</td>

</table>
 
  <?php
}

  ?>
        </div>
<br>


     
            

        </div>
    </div>
</div>
    </div>
    <script src="style/jquery-1.11.1.js"></script>
 

    <script src="style/jquery.fileDownload.js"></script>
    <script src="style/bootstrap.min.js"></script>
    <?php
 }
   }
   else
   {
	   echo "Hurmatli foydalanuvchi siz Kassir emassiz. <a href='index.php'>Qaytish</a> ";   
   }
	?>
     </body></html>