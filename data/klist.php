          
<div class="row">
 
     <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
            
     
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
    <input type="text" class="k-edit-form-container" name="fio" placeholder="FIO">      <input type="submit" class="btn btn-success" value="Найти"> 
</form>
 
    
      </div>
<br>
 <table width="100%" bordercolor="#3366FF" align="center" border="2"><tr class="title1"><td align="center"><strong>№</strong></td>
   <td align="center"><strong>Mijozning familiyasi<br />va ismi </strong></td><td align="center"><strong>Mijozning<br>
passport seriyasi</strong></td><td align="center"><strong> Doktor</strong></td><td align="center"><strong>Tanlangan xizmat </strong></td><td align="center"><strong>Ko'rsatiladigan<br> xizmatlar</strong></td><td align="center"><strong>Ro`yxatga olingan<br> vaqt</strong></td><td align="center"><strong> To'langan pul</strong></td><td align="center"><strong> Plastik</strong></td><td align="center"><strong> Naqt</strong></td><td align="center"><strong> Qarz</strong></td><td><strong>DEL</strong></td></tr>
<?php
$pt=0;
$pq=0;
$pn=0;
$pp=0;
$fio=$_POST['fio'];
$doc=$_POST['docname'];
$xiz=$_POST['xizname'];
$tdoc=$_POST['tdocname'];
$s="select * from `client` where `date` = '$day'";
if($fio!="") { $s=$s." and `fio` like '%$fio%'"; }
if(($doc!="0") and ($doc!="")) { $s=$s." and `doctors` = '$doc'";}
if(($tdoc!="0") and ($tdoc!="")) { $s=$s." and `tash_doctor_id` = '$tdoc'";}
if(($xiz!="0") and ($xiz!="")) { $s=$s." and `xiz_name` = '$xiz'";}
$s=$s." ORDER BY `id` DESC";
//echo $s;
		
		///   foiz chegarani o'rnatish
		$chdb=mysql_query("select * from `cheklash` where `id` = 1");
		$mchdb=mysql_fetch_array($chdb);
		$chekl=$mchdb['foiz'];
		$chch=0;
		///   foiz chegarani o'rnatish


$db1=mysql_query($s);
while ($mdb=mysql_fetch_array($db1))
{
	if ( ($mdb['t_pul']!=0) and ($mdb['qarz']==0)) 
		{
			$chch++;
		}
}
$x=($chch*$chekl)/100;
$d=1;
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
	if($d<=$x)             ///   foiz chegarani o'rnatish
	{
	echo "<tr><td align='center'><a href='client.php?pid=".$mdb['id']."'><b>".$mdb['navbat']."</b></a></td><td><a href='client.php?pid=".$mdb['id']."'>".$mdb['fio']."</a>$td</td><td><a href='client.php?pid=".$mdb['id']."'>".$mdb['passport']."</a></td><td><a href='client.php?pid=".$mdb['id']."'>".$mddb['fio']."</a></td><td><a href='client.php?pid=".$mdb['id']."'>".$mxdb['xizmat_name']."</a></td><td><a href='client.php?pid=".$mdb['id']."'>".$mdb['xizmat_type']."</a></td><td><a href='client.php?pid=".$mdb['id']."'>".convdate($mdb['date'])." (".$mdb['time'].")</a></td><td><a href='client.php?pid=".$mdb['id']."'>".$mdb['t_pul']."</a></td><td><a href='client.php?pid=".$mdb['id']."'>".$mdb['plastik']."</a></td><td><a href='client.php?pid=".$mdb['id']."'>".$mdb['naqt']."</a></td><td><a href='client.php?pid=".$mdb['id']."'>".$mdb['qarz']."</a></td><td><a class='dell' onclick=aa(".$mdb['id'].",'".$mdb['fio']."')><img src='images/x.png' width=20></a></td></tr>";
	$pt=$pt+$mdb['t_pul'];
	$pp=$pp+$mdb['plastik'];
	$pn=$pn+$mdb['naqt'];
	$d++;
	}

}
else
{
	echo"<tr";
if ($mdb['t_pul']==0) echo " bgcolor='#FFFF99'";
if ($mdb['qarz']!=0) echo " bgcolor='#Fcf'";

echo "><td align='center'><a href='client.php?id=".$mdb['id']."'><b>".$mdb['navbat']."</b></a></td><td><a href='client.php?id=".$mdb['id']."'>".$mdb['fio']."</a>$td</td><td><a href='client.php?id=".$mdb['id']."'>".$mdb['passport']."</a></td><td><a href='client.php?id=".$mdb['id']."'>".$mddb['fio']."</a></td><td><a href='client.php?id=".$mdb['id']."'>".$mxdb['xizmat_name']."</a></td><td><a href='client.php?id=".$mdb['id']."'>".$mdb['xizmat_type']."</a></td><td><a href='client.php?id=".$mdb['id']."'>".convdate($mdb['date'])." (".$mdb['time'].")</a></td><td><a href='client.php?id=".$mdb['id']."'>".$mdb['t_pul']."</a></td><td><a href='client.php?id=".$mdb['id']."'>".$mdb['plastik']."</a></td><td><a href='client.php?id=".$mdb['id']."'>".$mdb['naqt']."</a></td><td><a href='client.php?id=".$mdb['id']."'>".$mdb['qarz']."</a></td><td><a class='dell' onclick=aa(".$mdb['id'].",'".$mdb['fio']."')><img src='images/x.png' width=20></a></td></tr>";

$pt=$pt+$mdb['t_pul'];
$pp=$pp+$mdb['plastik'];
$pn=$pn+$mdb['naqt'];
}
 


if ( ($mdb['t_pul']!=0) and ($mdb['qarz']!=0)) $pq=$pq+$mdb['qarz'];
	  
}
?>
<tr><td colspan="2" align="center" style="font-size:20px;"><strong>Jami:</strong> </td><td colspan="10">
<strong style="color:#00F">To'langan pul: <?php echo $pt; ?></strong><br />
<strong style="color:#0F0">Plastikda: <?php echo $pp; ?></strong><br />
<strong style="color:#F0F">Naqtda: <?php echo $pn; ?></strong><br />
<strong style="color:#300">Kunlik qarz: <?php echo $pq; ?></strong><br />
<strong style="color:#006464">Umumiy summa:  <?php $pu=$pt+$pq; echo $pu; ?></strong></td></tr>
</table>

<form action="kassa.php" method="get">
 
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
