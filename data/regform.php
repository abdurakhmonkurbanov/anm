<?php
	if ($_POST['pass1']!="")
	{
		$pass1=$_POST['pass1'];
		$fio=$_POST['fio1'];
		$manzil=$_POST['manzil1'];
		
		$ppdb=mysql_query("select  * from `history` where `passport` like '$pass1' ");
		$mppdb=mysql_fetch_array($ppdb);
	 	if($mppdb['id']!="")
		{
		$fio=$mppdb['fio'];
		$manzil=$mppdb['manzil'];
		
			
		}
	}
	
	
?>

<table width="500" align="center"><tr><td> <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" class="form-signin"><div class="validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div>                    <div class="vertical-form-group">
                        
                <input class="form-control"  placeholder="FIO" value="<?php   echo $fio;  ?>"  name="fio" id="fio" type="text"><br>
                <input class="form-control"  placeholder="Manzil"   value="<?php   echo $manzil;  ?>"  name="manzil" id="manzil" type="text"><br>
                 <input class="form-control"  placeholder="Passport seriyasi va raqami"  value="<?php   echo $pass1;  ?>" onchange="pass()" id="passport"  name="passport" type="text">
                        
                         <label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    
              <select  class="form-control"   name="xizname" id="select">
              <option value="0"><strong>Xizmatlar turlari</strong></option>
              
			<?php $dat=mysql_query("select * from `xizmatlar`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option value='".$myr['id']."'>";  echo($myr['xizmat_name']);echo"</option>";

			}  ?>
              </select>
          </label>
     
          <label>Yo'llanma bergan doktor: (Agar mavjud bo'lsa)
              <select  class="form-control"   name="tashdoktor" id="select">
              <option value="0"><strong>Doktorni tanlang</strong></option>
              
			<?php $dat=mysql_query("select * from `tashqidoktor`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option value='".$myr['id']."'>";  echo($myr['fio']);echo"</option>";

			}  ?>
              </select>
          </label>
                    </div>
         <div class="vertical-form-group">
         <input type="hidden" value="1" name="next">
        <button type="submit" class="btn btn-success col-md-12" style="margin-bottom:20px;">
                Keyingi
            </button>
        </div>
</form></td></tr> </table>
<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
<input type="hidden" name="pass1" id="pass1" value="" />
<input type="hidden" name="fio1" id="fio1" value="" />
<input type="hidden" name="manzil1" id="manzil1" value="" />
<input type="submit" name="tugma" id="tugma" style="display:none" />
</form>
<script language="javascript">
function pass()
	{
		
		pass1.value=passport.value;
		
		if(pass1.value.length==9)
		{
		fio1.value=fio.value;
		manzil1.value=manzil.value;
		tugma.click();
		}
	
	}

</script>