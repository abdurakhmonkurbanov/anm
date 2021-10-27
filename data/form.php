<table width="500" align="center"><tr><td> <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" class="form-signin"><div class="validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div>                    <div class="vertical-form-group">
                        
                        <input class="form-control"  placeholder="FIO"  name="fio" type="text"><br>
                        <input class="form-control"  placeholder="Manzil"    name="manzil" type="text"><br>
                         <input class="form-control"  placeholder="Passport seriyasi va raqami"    name="passport" type="text"><br>
                          <input class="form-control"  placeholder="Tug'ilgan yili"    name="ty" type="text"><br>
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