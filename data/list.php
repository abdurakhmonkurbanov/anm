<?php
if($_GET['did']!="")
{
	$did=$_GET['did'];
	mysql_query("delete from `client` where `id` = '$did'")	;
	echo "<center>Ma`lumot o`chirildi</center>";
	
}


?>
<table width="100%" bordercolor="#3366FF" align="center" border="2"><tr class="title1 style=" style="
    background: yellowgreen;
    text-align:  center;
"><td align="center"><strong>Karta ID</strong></td><td>Mijozning familiyasi va ismi </td><td align="center">Mijozning<br>
passport seriyasi</td><td> Doktor</td><td>Tanlangan xizmat </td><td> Xizmatlar</td><td><b>To'lagan puli</b></td><td><strong>Vaqt</strong></td><td width="30">¹</td><td>Edit</td><td align="center">DEL</td></tr>

<?php
if(isset($que)=="")
{
	$que="select * from `client` where `date` = '$day' ORDER BY `id`  DESC";
}
$db1=mysql_query($que);
while ($mdb=mysql_fetch_array($db1))
{
	$xiz_id=$mdb['xiz_name'];
	$xdb=mysql_query("select * from `xizmatlar` where `id` = '$xiz_id'");
	$mxdb=mysql_fetch_array($xdb);
	
	$doc_id=$mdb['doctors'];
	$ddb=mysql_query("select * from `doctors` where `id` = '$doc_id'");
	$mddb=mysql_fetch_array($ddb);
	
	$hpass=$mdb['passport'];
	
	$pt=$pt+$mdb['t_pul'];
	$pp=$pp+$mdb['plastik'];
	$pn=$pn+$mdb['naqt'];
	
	if ($hpass!="")
	{
	$kartdb=mysql_query("select * from `history` where `passport` like '$hpass'");
	$mkartdb=mysql_fetch_array($kartdb);
	$kart_id=$mkartdb['id'];
	}
	else
	$kart_id="";
	echo"<tr";
	if ($mdb['t_pul']==0) echo " bgcolor='#FFFF99'";
	if ($mdb['qarz']!=0) echo " bgcolor='#Fcf'";

echo"><td align='center'><b>".$kart_id."</b></td><td>".$mdb['fio']."</td><td>".$mdb['passport']."</td><td>".$mddb['fio']."</td><td>".$mxdb['xizmat_name']."</td><td>".$mdb['xizmat_type']."</td><td>".$mdb['t_pul']."</td><td><b>".$mdb['time']."</b><td>".$mdb['navbat']."</td><td><a class='dell' onclick=edit(".$mdb['id'].",'".$mdb['fio']."')><img src='images/edt.png' width=20></a></td><td><a class='dell' onclick=aa(".$mdb['id'].",'".$mdb['fio']."')><img src='images/x.png' width=20></a></td>

</tr>";	  

	
}

?>
</table>
<form action="reg.php" method="get">
 
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

</div></div></div>