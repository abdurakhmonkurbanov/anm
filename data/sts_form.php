<?php
if(($_POST['next']=="") and (($_POST['token']=="reg") or ($_GET['token']=="reg")))
{
?> 

<table width="500" align="center"><tr><td> <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" class="form-signin" id="regfrm"><div class="validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div>                    <div class="vertical-form-group">
                        
                        <input class="form-control"  placeholder="FIO"  name="fio" type="text"><br>
                        <input class="form-control"  placeholder="Manzil"    name="manzil" type="text"><br>
                         <input class="form-control"  placeholder="Passport seriyasi va raqami"    name="passport" type="text"><br>
                          <input class="form-control-small" style="padding-top:0px"   placeholder="Tug'ilgan yili"    name="ty" type="date"><br>
                          <label> <input class=""     name="qaruvchi" value="1" type="checkbox"> Qarovchi</label><br>
                         <label>Xonani tanlang tanlang: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    
              <select  class="form-control"   name="xona_id" id="select">
              
			<?php $dat=mysql_query("select * from `sts_xona` where `kasal` < `member`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option value='".$myr['id']."'>";  echo($myr['number']);echo"-xona</option>";

			}  ?>
              </select>
          </label> <br />
           Qaysi sana gacha: 
           <input type="text" class="form-control-small"  placeholder="kun-oy-yil"  id="demo1" name="gacha" maxlength="25" size="25"/>
        <img src="data/cal.gif" onclick="javascript:NewCssCal('demo1')" style="cursor:pointer"/>   <br />
                    </div>
         <div class="vertical-form-group">
                <input type="hidden" name="token" value="reg">
                <input type="hidden" name="next" value="next">                
        <button type="submit" class="btn btn-success col-md-12" style="margin-bottom:20px;">
                Keyingi
            </button>
        </div>
</form></td></tr> </table>
<?php
}
if(($_POST['next']=="next") and ($_POST['token']=="reg"))    ///////  Keyingi qadam
	{
		if (($_POST['fio']!="") and ($_POST['passport']!="") and ($_POST['xona_id']!="") and ($_POST['gacha']!=""))
		{
		$fio=$_POST['fio'];
		$manzil=$_POST['manzil'];
		$passport=$_POST['passport'];
		$ty=$_POST['ty'];
		$x_id=$_POST['xona_id'];
		$qarov=$_POST['qaruvchi'];
		$gch=$_POST['gacha'];
		
		?>
         <table  style="margin-top:20px;" width="50%" bordercolor="#3366FF" align="center" border="2"><tr><td>
		<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" class="form-signin" id="regfrm">
        <input type="hidden" name="fio" value="<?php echo $fio; ?>" />
        <input type="hidden" name="passport" value="<?php echo $passport; ?>" />
        <input type="hidden" name="manzil" value="<?php echo $manzil; ?>" />
        <input type="hidden" name="ty" value="<?php echo $ty; ?>" />
        <input type="hidden" name="xona_id" value="<?php echo $x_id; ?>" />
        <input type="hidden" name="gacha" value="<?php echo $_POST['gacha']; ?>" />
        
        FIO: <b><?php echo $fio; ?> </b>  &nbsp; &nbsp; Passport S/R :<b> <?php echo $passport; ?></b><br />
		Tug'ilgan yili:<b> <?php echo $ty; ?> </b>  &nbsp; &nbsp; Manzili: <b><?php echo $manzil; ?> </b><br />
		Bemor <b><?php $gch=convdate1($gch); $kun=sana($day,$gch); echo $kun; ?> </b> kun davolanadi <?php echo  $_POST['gacha']; ?> sanagacha<br />
		
		<?php 
		$xdb=mysql_query("select * from `sts_xona` where `id` = '$x_id'");
		$mxdb=mysql_fetch_array($xdb);
		if ($qarov==1) {  $qarz=$mxdb['price']*$kun*0.9; ?> <input type="hidden" name="qaruvchi" value="1" />  <?php  }
		 
		else { $qarz=$mxdb['price']*$kun;  
		?>
         
 <label>Qarovchi doktor
              <select class="form-control" name="d_id" id="select">
              <option value="0">Doktorni tanlang</option>
			<?php $dat=mysql_query("select * from `doctors`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option value='".$myr['id']."'>";  echo($myr['fio']);echo"</option>";

			}  ?>
              </select>
          </label> <br />
       
        <?php
		}
		echo " To'lanilishi kerak bo'lgan pul: <b>";
		echo $qarz
		?> </b><br />

        &nbsp; &nbsp; &nbsp; &nbsp;    <strong>Qarz</strong>:  
        <input type="text" class="k-form-text-row" id="qarz" name="qarz"  style="margin-left:30px;" value="<?php echo $qarz ?>"> <br />
         <label  style="margin-left:30px; margin-top:10px">
        <input type="checkbox" name="plastik"  onclick="free1()" value="1" id="cash_pl"> &nbsp;<strong>Plastik</strong> 
       <input type="text" class="k-form-text-row" id="pl_input"   disabled  style="margin-left:30px;" value="" onChange="pl()" name="plastik"> <br>
     </label> <br />
<input type="hidden" name="pul" id="pul" value="<?php echo $qarz  ?>">
     <label  style="margin-left:30px; margin-top:10px">	
     <input type="checkbox"  onclick="free2()"  name="naqt" value="1" id="cash_nq">	&nbsp;<strong>Naqt</strong>
     <input type="text" class="k-form-text-row" disabled name="naqt" onChange="nq()" id="nq_input"  style="margin-left:30px;" value=""> </label>          <br />
		<input type="hidden" name="token" value="reg">
        <input type="hidden" name="save" value="save">
<center>  <input type="submit"  style="margin-top:20px;  margin-bottom:20px" class="form-control1" value="saqlash" id="submit_button" /> </center>
     </form>
            
         </td></tr></table>

<script language="JavaScript">

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

         <?php
		
		
		}
		else
		{
		?>
        <h2 align="center">Barcha ma`lumotlarni kiriting!</h2>
        <a href="sts_main.php?token=reg"><strong>Orqaga</strong></a>
        <?php	
		exit;
		}
		 
	
	}
		if($_POST['save']=="save")			////////////  Sqlash jarayoni
		{
	 		if (($_POST['fio']!="") and ($_POST['passport']!="") and ($_POST['xona_id']!="") and ($_POST['gacha']!=""))
				{
					$fio=$_POST['fio'];
					$manzil=$_POST['manzil'];
					$passport=$_POST['passport'];
					$ty=$_POST['ty'];
					$x_id=$_POST['xona_id'];
					$gacha=$_POST['gacha'];
					$qarz=$_POST['qarz'];
					$plastik=$_POST['plastik'];
					$naqt=$_POST['naqt'];
					$tp=$plastik+$naqt;
					$qarov=$_POST['qaruvchi'];
					$d_id=$_POST['d_id'];
					//echo $_POST['gacha'];
					$guncha=convdate1($_POST['gacha']);
					//echo  $kun."<br>".$guncha;

					if ($qarov==1) 
						{
							mysql_query("INSERT INTO `sts_main` 
							(`id`, `fio`, `passport`, `ty`, `manzil`, `xona_id`, `gacha`,  `t_pul`, `naqt`, `plastik`, `qarz`, `qarovchi`, `xiz_name_type_id`, `d_id`,`check`, `date`) VALUES 
							(NULL, '$fio', '$passport', '$ty', '$manzil', '$x_id', '$guncha',  '$tp', '$naqt', '$plastik', '$qarz', '1', '', '0', '0', '$day');");							
							$xdb=mysql_query("select * from `sts_xona` where `id` = '$x_id'");
							$mxdb=mysql_fetch_array($xdb);
							$kasal=$mxdb['kasal'];
							$kasal++;
							mysql_query("UPDATE  `sts_xona` SET `kasal` = '$kasal' WHERE  `id` = '$x_id' LIMIT 1;");
						}
					else
						{
							mysql_query("INSERT INTO `sts_main` 
							(`id`, `fio`, `passport`, `ty`, `manzil`, `xona_id`, `gacha`,  `t_pul`, `naqt`, `plastik`, `qarz`, `qarovchi`, `xiz_name_type_id`, `d_id`,`check`, `date`) VALUES 
							(NULL, '$fio', '$passport', '$ty', '$manzil', '$x_id', '$guncha',  '$tp', '$naqt', '$plastik', '$qarz', '0', '', '$d_id', '0', '$day');");		
							$xdb=mysql_query("select * from `sts_xona` where `id` = '$x_id'");
							$mxdb=mysql_fetch_array($xdb);
							$kasal=$mxdb['kasal'];
							$kasal++;
							mysql_query("UPDATE  `sts_xona` SET `kasal` = '$kasal' WHERE  `id` = '$x_id' LIMIT 1;");
						
						}////////////////////////
						echo "Ma`lumot saqlandi";
						
				}
	
		}
?>