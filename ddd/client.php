<?php 
include("data/db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="stylesheet" href="data/styles1.css" type="text/css" />
<title>Client</title>
</head>
<body class="ww">
<?php
$id=$_GET['id'];
if($id!="")
{
	$db1=mysql_query("select * from `client` where `id` = '$id'");
	$mdb=mysql_fetch_array($db1);
	$dn=$mdb['doctors'];
				$db2=mysql_query("select * from `doctors` where `fio` like '$dn'");    ///  Navbatni aniqlash
				$mdb2=mysql_fetch_array($db2);
				$nav=$mdb2['oxir_num'];       ///  Navbatni aniqlash
?>
<table width="25%" border="0" with=10%><tr><td width="10%">
 <div align=center><font color='#F0F' size='4px'><b>Doniyo Shifo klinikasi</b></font></div>
 <font size=-1><div>FIO: <b><?php echo($mdb['fio']);?></b></div></font>
 <font size=-1><div>Xizmat: <b><?php echo($mdb['xiz_name']);?></b></div></font>
<font size=-1><div>Tekshirishlar: <b><?php echo($mdb['xizmat_type']);?></b></div></font> 
 <font size=-1><div><u><b>Doktor: <?php echo($mdb['doctors']);?></b></u></div></font> 
 <font size=4><div>Navbat: <b><?php echo($nav);?></b></div></font>
 <font size=-1><div>Xizmat narxi: <b><?php echo($mdb['t_pul']);?></b></div></font>   
 <font size=-1><div>To`lov shakli <b><?php    
 	if($mdb['cash']=="n") 
		{ 
		echo "Naqd"; 
		} 
	else 
		{ 
		echo "Plastik karta orqali"; 
		}  ?></b></div></font>      
  <font size=-1><div>Sana: <b><?php echo(dateconv($mdb['data'])." &nbsp;&nbsp;&nbsp; Vaqt: ");  echo($mdb['time']);?></b></div></font>  
 <a href="index.php">Orqaga</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:window.print() ">Chop etish</a>


 </td></tr></table>
<?php
}
?>
</body>
</html>