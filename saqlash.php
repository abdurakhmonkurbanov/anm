<table align="center" width="80%" border="1"><tr><td align="center">
<?php  
$fio=$_POST['fio'];
$ty=$_POST['ty'];
$manzil=$_POST['manzil'];
$passp=$_POST['passport'];
$xizname_id=$_POST['xizname'];
$tashdoctor=$_POST['tashdoktor'];
if ($fio=="") {  echo" Ma`lumotlar to`liq emas! &nbsp;&nbsp;&nbsp;<a href=reg.php>Asosiy panelga o`tish</a>"; exit();}
if ($xizname_id=="0") {  echo" Ma`lumotlar to`liq emas! &nbsp;&nbsp;&nbsp;<a href=reg.php>Asosiy panelga o`tish</a>"; exit();}

/////////////////////////   saqlash jarayoni uchun

?>

 <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
Mijozning ismi familiyasi: <b> <font  color="#0000FF"><?php echo($fio);?></font></b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
Tug'ilgan yili: <b><font  color="#0000FF"><?php echo($ty);?></font></b><br><br>
Yashash manzili: <b><font  color="#0000FF"><?php echo($manzil);?></font></b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
Xizmat turi <b><font  color="#0000FF"><?php
$xdb=mysql_query("select * from `xizmatlar` where `id` = '$xizname_id'");
$mxdb=mysql_fetch_array($xdb);

 echo($mxdb['xizmat_name']);?></font></b>  

 </font>
 <?php  ///  Avval kelgan bo'lsa va qarzi bo'lsa
 if ($passp!="")
 {
 	$b=1;
	$avdb=mysql_query("select * from `client` where `passport` like '$passp'");
	 while($mavdb=mysql_fetch_array($avdb))
	 {
	 if($mavdb['fio']!="")	//  Avval kelgan
 		{
			if($b=1) { echo "<br>Bu mijoz <b>". convdate($mavdb['date'])."</b> da bizdan ro`yxatdan o`tgan<br>";}
			$b=2;
			 if (($mavdb['t_pul']!=0) and ($mavdb['qarz']!=0))
			 {
			 	echo "Bu mijozning ".convdate($mavdb['date'])." da ".$mavdb['qarz']." so`m qarzi bor <br>";
			 }
 		}
	 }
 }
 
 ?>
 
 <br>
<p>

<?php  
$dat=mysql_query("SELECT *  FROM `xizmatlar` WHERE `id` = '$xizname_id'");
$myr=mysql_fetch_array($dat);
$num=$myr['id'];

?>
  <table align="left"  class="tab" border="1" width="100%">
  <tr><td align="center"><strong>Doktorni tanlang</strong></td><td align="center"> <strong>Xizmat ko'rsatish turi va narxi</strong>  </td>  </tr>
  
  <tr><td valign="top">   
  
      <?php  
	  $dxiz=$myr['xizmat_name'];
	  $dat2=mysql_query("SELECT *  FROM `doctors` WHERE `xiz_name` LIKE '$dxiz'");
	  $d=1;
	  while ($myr2=mysql_fetch_array($dat2))
	  {
	  ?>    <label  style="margin-left:10px; margin-top:8px; ">
        <input type="radio" name="dname" value="<?php echo($myr2['id']); ?>" id="doctors_0">
        <?php echo($myr2['fio']); ?></label>
      <br>
      <?php   } ?>
   
  </td> <td valign="top" >
<table border="1" width="100%">
  <?php 
  $dat1=mysql_query("SELECT *  FROM `xizmat_type` WHERE `xiz_name_id` = '$num'");
  $raq=mysql_num_rows($dat1);
  $i=1;
  while ($myr1=mysql_fetch_array($dat1))
  {  
  $s=($myr1['xizmat_type']);
  $narr=($myr1['narxi']);
   echo"<tr><td> <label> &nbsp; <input type=checkbox onclick=tp()  name='na$i'  value='$s'  id=xizmattype> &nbsp; <b>$s</b>  </label><input name='nar$i' type=hidden value=$narr> </td><td>";
   echo($myr1['narxi']."</td></tr>");
   $i=$i+1;
  }  
  ?>
  
 

 </table> 
</td><tr></table> 
<!---   Jo'natishlar --->
<input type="hidden" name="fio" value="<?php echo($fio); ?>">
<input type="hidden" name="passport" value="<?php echo($passp); ?>">
<input type="hidden" name="ty" value="<?php echo($ty); ?>">
<input type="hidden" name="manzil" value="<?php echo($manzil); ?>">
<input type="hidden" name="xizname" value="<?php echo($xizname_id); ?>">
<input type="hidden" name="raq" value="<?php echo($raq); ?>">
<input type="hidden" name="tashdoktor" value="<?php echo($tashdoctor); ?>">
<input type="hidden" value="1" name="ok">
         
<!---  <input type="checkbox" name="ch" onclick="ww()" />   
 <input type="text" name="pmm" />     --->
<button type="submit" class="btn btn-success" style="margin-bottom:10px; margin-top:10px;"> Saqlash</button> &nbsp; 
 <a style="margin-bottom:10px; margin-top:10px;" class="" href="reg.php"><strong>Bekor qilish</strong></a>
</form>
 
 <script language="JavaScript">
 function tp()
 {
	  var form0=document.forms[0];
	  var form1=document.forms[1];
	   var pm=form0.elements.pm;
	  <?php 
  $dat1=mysql_query("SELECT *  FROM `xizmat_type` WHERE `xiz_name_id` = '$num'");
  $raq=mysql_num_rows($dat1);
  $i=1;
  while ($myr1=mysql_fetch_array($dat1))
  {  
  $narr=($myr1['narxi']);
  $i=$i+1;
 ?>
	   var ch<?php echo($i);?>=form1.elements.na<?php echo($i);?>;
	   if(ch<?php echo($i);?>.checked)
	   {
		pm.value=pm.value-(-1)*<?php echo($narr);?>;    
	   }
	   else
	   {
		pm.value=pm.value-<?php echo($narr);?>; 
	   }
	<?php
	 }  
  ?>  
 }
/*  function ww()
 {
 var form=document.forms[1];
var form1=document.forms[0];
 var ch=form.elements.ch;
 var pmm=form.elements.pmm;
 if(ch.checked)
 {
	
	pmm.value=11;
 }
 else
 {
	pmm.value=88; 
 }
 } */
 
 </script>


