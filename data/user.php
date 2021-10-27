<?php
 if($_SESSION['type']==1)      /// Asosiy
   {
	
	if($_POST['fio']!="")
	{
		
		$fio=$_POST['fio'];
		$login=$_POST['login'];
		$password=$_POST['password'];
		$user1=$_POST['user1'];
		$user2=$_POST['user2'];
		$uedit=$_POST['uedit'];
		if($uedit!="")		////  O'zgartirish uchun
		{	
			//UPDATE `anm`.`user` SET `user` = '111', `login` = '222', `parol` = '333', `type` = '5' WHERE `user`.`id` = 11 LIMIT 1;
			
			if(($user1!=0) and ($user2==0))
		{
			mysql_query("UPDATE `user` SET `user` = '$fio', `login` = '$login', `parol` = '$password', `type` = '$user1', `doctor_id` = 0 WHERE `id` = '$uedit' LIMIT 1;");	
			echo "Foydalanuvchi o`zgardi";
			$fio="";
			$login="";
			$password="";
		}
		if(($user1==0) and ($user2!=0))
		{
			mysql_query("UPDATE `user` SET `user` = '$fio', `login` = '$login', `parol` = '$password', `type` = '5', `doctor_id`  = '$user2' WHERE `id` = '$uedit' LIMIT 1;");	
			echo "Foydalanuvchi o`zgardi";
			$fio="";
			$login="";
			$password="";
		}
		if (($user1==0) and ($user2==0))
		{
			echo "Foydalanuvchi typini ko`rsating";
			
		}
			
			
		}
		else				///   Yangi foydalanuvchi
		{
		if(($user1!=0) and ($user2==0))
		{
			mysql_query("INSERT INTO `user` (`id`, `user`, `login`, `parol`, `type`, `doctor_id`) VALUES (NULL, '$fio', '$login', '$password', '$user1', '0');");	
			echo "yangi foydalanuvchi qo`shildi";
			$fio="";
			$login="";
			$password="";
		}
		if(($user1==0) and ($user2!=0))
		{
			mysql_query("INSERT INTO `user` (`id`, `user`, `login`, `parol`, `type`, `doctor_id`) VALUES (NULL, '$fio', '$login', '$password', '5', '$user2');");	
			echo "yangi foydalanuvchi qo`shildi";
			$fio="";
			$login="";
			$password="";
		}
		}
		
	}

?>


<table width="90%" bordercolor="#3366FF" align="center" border="2" ><tr><td width="50%" style="padding-left:15px; padding-right:15px;">
    <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
        	<?php
			if ($_GET['edit']!="")  ///  ssilka uchun shart
			{
				$uid=$_GET['edit'];
				echo "<input type='hidden' name='uedit' value='$uid'>";
				$edb=mysql_query("Select * from `user` where `id` = '$uid'" );
				$medb=mysql_fetch_array($edb);
				$fio=$medb['user'];
				$login=$medb['login'];
				$password=$medb['parol'];
			}
			if ($_GET['did']!="")
			{
			$did=$_GET['did'];
			mysql_query("delete from `user` where `id` = '$did'");	
				
			}
			?>
          <center>  <strong>Yangi foydalanuvchi joylashtirish<br></strong></center>
            Foydalanuvchi FIO <input class="form-control" type="text" name="fio" value="<?php echo $fio;  ?>" placeholder="FIO"  style="margin-top:0px;">

            Login: <input type="text" name="login" value="<?php echo $login;  ?>"  class="form-control" placeholder="Login"  style="margin-top:0px;">  

			Parol: <input type="text" name="password" value="<?php echo $password;  ?>"  class="form-control" placeholder="Parol"  style="margin-top:5px;"> 
      		
            
           <br> <label>Foydalanuvchi turi: 
              <select class="form-control" name="user1" id="select">
              <option value="0">Foydalanuvchi turi</option>
              <option value="1">Administrator</option>
              <option value="2">Kassir</option>
              <option value="3">Registrator</option>
			 <option value="4">Meneger</option>
             <option value="6">Starsionar</option>
              </select>
          </label>  
            <br>
            <label>Doktorlar uchun foydalanuvchi
              <select class="form-control" name="user2" id="select">
              <option value="0">Doktorni tanlang</option>
			<?php $dat=mysql_query("select * from `doctors`");  
			while ($myr=mysql_fetch_array($dat))
			{
				echo"<option value='".$myr['id']."'>";  echo($myr['fio']);echo"</option>";

			}  ?>
              </select>
          </label>  
                <br>
         <center>  <input type="submit" class="btn btn-success" value="Qo'shish"></center>
    </form>
 </td><td valign="top"  style="padding-left:15px;  padding-right:15px;">
 <a class="k-unlink" href="xizmatlar.php">Yangi xizmatlarni ro'yxatga olish</a>
 <hr>
 <a class="k-unlink" href="doctor.php">Yangi doktorni ro'yxatga olish</a>
  <hr>
  <a class="k-unlink" href="tdoctor.php">Yangi tashqi doktorni ro'yxatga olish</a>
   <hr>
    <a class="k-unlink" href="sts_xona.php">Xonalarni ro'yxatga olish</a>
   <hr>
  <?php
   if ($_POST['cheklash']!="")
	{
		$chekl=$_POST['cheklash'];
		mysql_query("UPDATE `cheklash` SET `foiz` = '$chekl' WHERE `id` =1 LIMIT 1 ;");		
				
	}
	$chdb=mysql_query("select * from `cheklash` where `id` = 1");
		$mchdb=mysql_fetch_array($chdb);
	
   ?>
     <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post">
     Cheklash foizini o'rnatish: <input type="text" name="cheklash" value="<?php echo $mchdb['foiz']; ?>"  class="arrow" placeholder="100"  style="margin-top:5px;"> %

      <center>  <input type="submit" class="btn btn-success" value="Cheklash" style="margin-top:10px"></center>
     </form>
      
 </td></tr></table>
      </div>
<br>


     
          <table width="100%" bordercolor="#3366FF" align="center" border="2"><tr class="title1"> 
   <td align="center"><strong>Admin familiyasi<br />va ismi </strong></td><td align="center"><strong>Login</strong></td><td align="center"><strong> Parol</strong></td><td align="center"><strong>Foydalanuvchi tipi</strong></td><td>Taxrirlash</td></tr>
   <?php
   $udb=mysql_query("select * from `user`");
   while($mudb=mysql_fetch_array($udb))
   {
	echo "<tr><td>".$mudb['user']."</td><td>".$mudb['login']."</td><td>".$mudb['parol']."</td><td>";
	if ($mudb['type']==1) echo "Administrator";
	if ($mudb['type']==2) echo "Kassir";
	if ($mudb['type']==3) echo "Registrator";
	if ($mudb['type']==4) echo "Meneger";
	if ($mudb['type']==5) echo "Doktor";
	if ($mudb['type']==6) echo "Starsionar";
	   echo"</td><td> <a href='admin.php?edit=".$mudb['id']."'><img src='images/uedit.png' width=20></a> &nbsp;  <a href='admin.php?did=".$mudb['id']."'><img src='images/udel.png' width=20></a></td></tr>";
	   
   }
   ?>
   
   
   
   </table>
<?php
   }
?>