<?php 
include("data/db.php");
	  mysql_query("SET NAMES cp1251");
?>
<!DOCTYPE html>
<html class=""><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <title>Astro Neyromed</title>

    <link rel="shortcut icon" href="http://meddatademo.bepro.uz/Content/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://meddatademo.bepro.uz/Content/images/favicon.ico" type="image/x-icon">
    <script src="date/datetimepicker_css.js"></script>

    <meta name="viewport" content="width=device-width">
    <!--Icons-->

    <link href="style/navigation-icon.css" rel="stylesheet">
    <link href="style/font-awesome.min.css" rel="stylesheet">
    <link href="style/Fonts.css" rel="stylesheet">
    <link href="style/notify.css" rel="stylesheet">
    <!--Icons-->
    <!--Bootstrap - 3.2.0-->
    
    <link href="style/bootstrap.css" rel="stylesheet">
<link href="style/bootstrap-theme.css" rel="stylesheet">


    <!--02.10.2014 select-2-->
    <link href="style/select2.css" rel="stylesheet">
    <link href="style/select2-bootstrap.css" rel="stylesheet">
    <!--02.10.2014 select-2-->
    <!--Bootstrap - 3.2.0-->
    <!--Main Styles-->
    <link href="style/components.css" rel="stylesheet">
<link href="style/bootstrap-edit.css" rel="stylesheet">
<link href="style/main-styles.css" rel="stylesheet">
<link href="style/bepro-select-2.css" rel="stylesheet">
<link href="style/custom.css" rel="stylesheet">

    <!--Main Styles-->
    <!--Kendo-->
    <link href="style/kendo.common.min.css" rel="stylesheet">
    <link href="style/kendo.metro.med.min.css" rel="stylesheet">
    <link href="style/kendo.silver.mobile.min.css" rel="stylesheet">
    <link href="style/kendo.custom.css" rel="stylesheet">
    <link href="style/Site.css" rel="stylesheet">
    

    <link href="style/normalize.min.css" rel="stylesheet">
<style type="text/css">
@media screen {
     
      
      #content {
            
            font-size: 15px;
			 color: #000000;
			 margin-left:20px;
      }
	  #leftcolumn {
            
           
            font-size: 15px;
      }
      
}

@media print {
      
      #content{
           
         
            font-size: 15px;
            color: #000000;
            margin-left:20px;
      }
	   #leftcolumn {
            display: none;
      }
     
}


</style>

</head>
<body class="for-top-menu">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            
            <a class="navbar-brand" href="">
            <br>
 <div class="hospital-name"><img src="./images/meddata_ico.png" width="32">  Astro Neyromed    </div>
            </a>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li id="Reporting">
<a href="index.php">Главная</a>
                </li>
            </ul>
            <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a><strong>Starsionar davolanish</strong></a>
                </li>
            </ul> 
            
            <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a href="sts_main.php?token=reg"><strong>Ro'yxatga olish</strong></a>
                </li>
            </ul> 
            <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a href="sts_main.php?token="><strong>Asosiy oyna</strong></a>
                </li>
            </ul>  <ul class="nav navbar-nav">

                <li id="Reporting" class="center-block">
<a href="sts_arxiv.php?token="><strong>Arxiv bo`limi</strong></a>
                </li>
            </ul> 
             
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
admin
                            <i class="icon-angle-down "></i>
                        </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Профиль </a></li>
                        <li id="Dashboard">
<a href="#">Администрирование</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                           <a href="index.php?token=exit">Выход</a>
                        </li>
                    </ul>
                </li>
            </ul>
            


<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="http://meddatademo.bepro.uz/ru-RU/Cashbox/Payment#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="language name">
                русский (Россия)&nbsp;<span class="sf-sub-indicator">
                    <i class="icon-angle-down "></i>
                </span>
            </span></a>
        <ul class="dropdown-menu" role="menu">
            <li class="divider"></li>
                <li>
                    <a href="http://meddatademo.bepro.uz/uz-Cyrl-UZ/Cashbox/Payment">Ўзбекча (Ўзбекистон&nbsp;Республикаси)</a>
                </li>
                <li>
                    <a href="http://meddatademo.bepro.uz/uz-Latn-UZ/Cashbox/Payment">O'zbekcha (O'zbekiston Respublikasi)</a>
                </li>
        </ul>
    </li>
</ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

    <div class="container-fluid main-container">
        
<?php

if ($_SESSION['type']==6)
{

	if($_GET['did']!="")
		{
			$did=$_GET['did'];
			$sx=mysql_query("select * from `sts_main` where `id` = '$did'");
			$msx=mysql_fetch_array($sx);
			$xn=$msx['xona_id'];
			$xdb=mysql_query("select * from `sts_xona` where `id` = '$xn'");
			$mxdb=mysql_fetch_array($xdb);
			$xk=$mxdb['kasal'];
			$xk--;
			mysql_query("update `sts_xona` set `kasal` = '$xk' where `id` = $xn");
			mysql_query("delete  from `sts_main` where `id` = $did");		
		}
	 
if(($_GET['token']=="reg") or ($_POST['token']=="reg")) { include("data/sts_form.php"); $_SESSION['token']="sts_reg";}
if (($_GET['token']=="") and ($_POST['token']==""))  { include("data/sts_list.php"); $_SESSION['token']="sts_main";}

}
 else
   {
	echo "Hurmatli foydalanuvchi siz Kassir emassiz. <a href='index.php'>Qaytish</a> ";   
	   
   }
?>
        </div>
    </div>
</div>

         

        
    </div>
    <script src="style/jquery-1.11.1.js"></script>
 

    <script src="style/jquery.fileDownload.js"></script>
    <script src="style/bootstrap.min.js"></script>
     </body></html>