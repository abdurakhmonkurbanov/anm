<?php 
include("data/db.php");
	  mysql_query("SET NAMES cp1251");
?>
<!DOCTYPE html>
<html class=""><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    
    <title>Авторизация - Medical Teams</title>
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://meddatademo.bepro.uz/Content/images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width">

    <!--Icons-->
    <link href="./Style/navigation-icon.css" rel="stylesheet">
    <link href="./Style/font-awesome.min.css" rel="stylesheet">
    <!--Icons-->
    <!--Bootstrap - 3.2.0-->
    <link href="./style/bootstrap.css" rel="stylesheet">
    <link href="./style/bootstrap-theme.css" rel="stylesheet">
    <!--Bootstrap - 3.2.0-->
    <!--Fonts-->
    <link href="./style/Fonts.css" rel="stylesheet">
    <!--Fonts-->
    <!--Main Styles-->
    <link href="./style/components.css" rel="stylesheet">
    <link href="./Styles/bootstrap-edit.css" rel="stylesheet">
    <link href="./style/main-styles.css" rel="stylesheet">
    <link href="./style/custom.css" rel="stylesheet">
    <!--Main Styles-->
    <style>
        .input-group-addon {
    padding: 0px 0px;
    font-size: 0px;
    font-weight: normal;
    line-height: 0;
    color: #555;
    text-align: center;
    background-color: #35a291;
    border: 0px solid #35a291;
    border-radius: 0px;
    margin: 0;
}
        ul>li{
            color:#2C9585;
        }
    </style>
</head>
<body class="">
    <div class="login-cover-image ">
        <img src="./images/back-back.jpg">
    </div>
   
    <div class="container-fluid main-container">
      <br>
<br>

    <br>
<br>
     <div class="account">

            <div class="row">
              
                <div class="hospital-name"><img src="./images/meddata_ico.png" width="32">  Astro Neyromed </div><div><?php
if ($_SERVER['REQUEST_METHOD']=='POST')
					{
						if ((!empty($_POST['login'])) and (!empty($_POST['Password'])))
							{
								$login=$_POST['login'];
								$password=$_POST['Password'];
								$db1=mysql_query("select * from `user` where `login` like '$login' and `parol` like '$password'");
								$mdb1=mysql_fetch_array($db1);
								if ($mdb1['user']!="") 
									{ 
										$type=$mdb1['type']; 
										$_SESSION['user']=$mdb1['user'];
										$_SESSION['login']=$login;
										$_SESSION['pass']=$password;
										$_SESSION['type']=$type;
										//echo "qqqqqqqqqqqqq".$_SESSION['login'];
										if ($type==1)  ///  Agar kirgan foydalanuvchi Admin bo'lsa
											{
												echo "&nbsp; &nbsp; &nbsp; Hurmatli ".$_SESSION['user']." <a href='admin.php'>Administrator paneliga</a> o`tishingiz mumkin <br> <center><a href='index.php?token=exit'>chiqish</a></center>";
											}
										if ($type==2)  ///  Agar kirgan foydalanuvchi kassir bo'lsa
											{
												echo "&nbsp; &nbsp; &nbsp; Hurmatli ".$_SESSION['user']." <a href='kassa.php'>Kassa paneliga</a> o`tishingiz mumkin <br> <center><a href='index.php?token=exit'>chiqish</a></center>";
											}
										if ($type==3)  ///  Agar kirgan foydalanuvchi registrator bo'lsa
											{
												echo "&nbsp; &nbsp; &nbsp; Hurmatli ".$_SESSION['user']." <a href='reg.php'>Registratsiya paneliga</a> o`tishingiz mumkin<br> <center><a href='index.php?token=exit'>chiqish</a></center>";
											}
											
										if ($type==4)  ///  Agar kirgan foydalanuvchi registrator bo'lsa
											{
												echo "&nbsp; &nbsp; &nbsp; Hurmatli ".$_SESSION['user']." <a href='meneger.php'>Meneger paneliga</a> o`tishingiz mumkin<br> <center><a href='index.php?token=exit'>chiqish</a></center>";
											}
										if ($type==5)  ///  Agar kirgan foydalanuvchi registrator bo'lsa
											{
												echo "&nbsp; &nbsp; &nbsp; Hurmatli ".$_SESSION['user']." <a href='doctorpanel.php'>Doktorlar paneliga</a> o`tishingiz mumkin<br> <center><a href='index.php?token=exit'>chiqish</a></center>";
												$_SESSION['doc_id']=$mdb1['doctor_id'];
											}
										if ($type==6)  ///  Agar kirgan foydalanuvchi registrator bo'lsa
											{
												echo "&nbsp; &nbsp; &nbsp; Hurmatli ".$_SESSION['user']." <a href='sts_main.php'>Starsionar davolanish</a> <center><a href='index.php?token=exit'>chiqish</a></center>";
											}
										if ($type==7)  ///  Agar kirgan foydalanuvchi kassir bo'lsa
											{
												echo "&nbsp; &nbsp; &nbsp; Hurmatli ".$_SESSION['user']." <a href='kassa01.php'>Kassa paneliga</a> o`tishingiz mumkin <br> <center><a href='index.php?token=exit'>chiqish</a></center>";
											}
										
									}
								else 
								{
								echo "Login yoki parol noto`g`ri";	
								include("data/auto.php");
									
								}
								
							}
							else 
								{
								echo "Login va parolni kiriting";	
								include("data/auto.php");
									
								}
	
}
else 
{
	include("data/auto.php");
}
	
	
	?>   </div>
                 </div>
        </div>
        <div class="col-xs-12 main-footer green">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="text-left">

                <span>© Все права защищены.</span>

            </div>

        </div>
        <div class="col-md-4 col-sm-4" style="padding-left:20px; font-weight:700; text-align:center"></div>
        <div class="col-md-4 col-sm-4">
            <div class="text-right">
                Anm 2018 - 2022  <span>  01.18.2017</span>
            </div>

        </div>
    </div>
</div>

    </div>
        <script src="./js/jquery-1.11.1.js"></script>
<script src="./js/jquery-migrate-1.2.1.js"></script>

        <script src="./js/bootstrap.min.js"></script>





</body></html>