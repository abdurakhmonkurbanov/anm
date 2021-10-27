<h2 align="center">Asosiy oyna</h2>
 <table width="100%" bordercolor="#3366FF" align="center" border="2">
 <tr>
 <?php
 $xxdb=mysql_query("select * from `sts_xona` ");
$i=0;
 while($mxxdb=mysql_fetch_array($xxdb))
 {
	 if($i==4) { echo "</tr><tr>"; $i=1;  }
	 echo "<td valign='top' width='25%'><div align='center'><u>".$mxxdb['number']."-xona &nbsp; ";
	 echo "<b>".$mxxdb['member']."</b> kishilik</u> <b>".$mxxdb['kasal']."</b> ta bemor mavjud</div>";
	 $x_id=$mxxdb['id'];
	 $n=1;
	 $kdb=mysql_query("select * from `sts_main` where `xona_id` = '$x_id' and `check` = '0'");
	 while($mkdb=mysql_fetch_array($kdb))
	 {
		 $gacha=$mkdb['gacha'];
		 echo "<hr style='border-color:#0C0'>";		 
		 echo"<a href='sts_client.php?pid=".$mkdb['id']."'>";
		 if ($mkdb['qarz']!=0) 
		 	{ 
				echo "<span style='color:#F00;'>$n-".$mkdb['fio']."</span></a>";
				echo " <font size=-1>(bu bemorda <b>".$mkdb['qarz']."</b> so`m qarzi bor)</font>"; 
			}
		 if ($mkdb['qarz']==0) 		 echo "$n-".$mkdb['fio']."</a>";
		 if($day>$gacha) echo "<br> <font size=-1> <span style='color:#F0F'>bemorning vaqti <b>".convdate($mkdb['gacha'])."</b> da tugagan</span></font>";
		 
		 
		 $n++;
		 
	 }
	 $i++;
	 

 }
 
 
 ?>
 </tr>
 </table>

 <span style='color:#F0F'></span>

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
  <td align="center"><strong> To'langan pul</strong></td><td align="center"><strong> Qarz</strong></td><td><strong>DEL</strong></td></tr>
<?php
$pt=0;
$pq=0;
$pn=0;
$pp=0;
$fio=$_POST['fio'];
$x_id=$_POST['x_id'];
$s="select * from `sts_main` where `check` = '0'";
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
	 
	echo "<tr><td align='center'><a href='sts_client.php?pid=".$mdb['id']."'><b>".$mdb['navbat']."</b></a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mdb['fio']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mdb['passport']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mxodb['number']."-xona</a></td>";
	if ($mdb['qarovchi']==1) echo "	<td><a href='sts_client.php?pid=".$mdb['id']."'>qarovchi</a></td>";
	else echo "<td>&nbsp;</td>";
	echo "<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mddb['fio']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$kun." kun</a></td>
	 

	<td><a href='sts_client.php?pid=".$mdb['id']."'>".convdate($mdb['date'])."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mdb['t_pul']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mdb['qarz']."</a></td>
	<td><a class='dell' onclick=aa(".$mdb['id'].",'".$mdb['fio']."')><img src='images/x.png' width=20></a></td></tr>";
	$pt=$pt+$mdb['t_pul'];
	$pp=$pp+$mdb['plastik'];
	$pn=$pn+$mdb['naqt'];
}
else
{
	echo"<tr";
if ($mdb['t_pul']==0) echo " bgcolor='#FFFF99'";
if ($mdb['qarz']!=0) echo " bgcolor='#Fcf'";

echo "><td align='center'><a href='sts_client.php?pid=".$mdb['id']."'><b>".$mdb['navbat']."</b></a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mdb['fio']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mdb['passport']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mxodb['number']."-xona</a></td>";
	if ($mdb['qarovchi']==1) echo "	<td><a href='sts_client.php?pid=".$mdb['id']."'>qarovchi</a></td>";
	else echo "<td>&nbsp;</td>";
	echo "<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mddb['fio']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$kun." kun</a></td>
	 

	<td><a href='sts_client.php?pid=".$mdb['id']."'>".convdate($mdb['date'])."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mdb['t_pul']."</a></td>
	<td><a href='sts_client.php?pid=".$mdb['id']."'>".$mdb['qarz']."</a></td>
	<td><a class='dell' onclick=aa(".$mdb['id'].",'".$mdb['fio']."')><img src='images/x.png' width=20></a></td></tr>";

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
<form action="sts_main.php" method="get">
 
<input type="hidden" value="" name="did" id="did1" />

<input type="submit" name="ss" id="ss1" style="display:none"/>
</form>

<script language="javascript">
function aa(i,j)
{
if(confirm("Siz haqiqatdan ham "+j+" ni o`chirasizmi!")==true)
{
 
	 did1.value=i;
	 ss1.click();	 
}
	
}

</script>