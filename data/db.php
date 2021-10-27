<?php 
	  $db=mysql_connect('localhost','root','');
	  mysql_select_db("anm",$db);
	  session_start();
$day=date("Y-m-d");
function dateconv($dd)
{
	
$dan=substr($dd,8,2).".".substr($dd,5,2).".".substr($dd,0,4);
return $dan;
	
}
$da=date("Y-m-d");    //Joriy sana aniqlandi
$f=fopen("1.txt","r");
$buff=fread($f,10);  // fayl ichidagi ma'lumotlar o'qildi.
fclose($f);
if ($da != $buff) 
{
	$f=fopen("1.txt","w");
	fwrite($f,$da);   //////////// Agar sana o'zgargan bo'lsa sanoqni boshidan boshla
	fclose($f);
	$updoc=mysql_query("UPDATE `doctors` SET `oxir_num` = '0'");

}

 

$token=$_GET['token'];
$token=testinp($token);
if($token=="exit")
{
$_SESSION['user']="";
$_SESSION['login']="";	
$_SESSION['pass']="";
$_SESSION['type']="";	
}

	function testinp($data)    ///  Belgilarni tekshirish
	{
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		$data=str_replace('script','ss',$data);
		$data=str_replace('<?php','ss',$data);
		$data=str_replace('mysql','ss',$data);
		$data=str_replace('update','ss',$data);
		$data=str_replace('insert','ss',$data);
		$data=str_replace('delete','ss',$data);
		return $data;
	
	}
	function testfikr($data)    ///  Belgilarni tekshirish
	{
		$data=trim($data);
		$data=stripcslashes($data);
		$data=str_replace('script','ss',$data);
		$data=str_replace('<?php','ss',$data);
		$data=str_replace('mysql','ss',$data);
		$data=str_replace('update','ss',$data);
		$data=str_replace('insert','ss',$data);
		$data=str_replace('delete','ss',$data);
		return $data;
	}
	

$day=date("Y-m-d");
$dayn=date("d.m.Y");
	function convdate($dd1)
		{
			$dan1=substr($dd1,8,2).".".substr($dd1,5,2).".".substr($dd1,0,4);
			return $dan1;
		}
	function convdate1($dd1)
		{
			$dan1=substr($dd1,6,4)."-".substr($dd1,3,2)."-".substr($dd1,0,2);
			return $dan1;
		}
		function oy($dm)
			{
			switch ($dm)  
		{
			case 1: $dm=31; break;
			case 2: $dm=59; break;
			case 3: $dm=90; break;
			case 4: $dm=120; break;
			case 5: $dm=151; break; 
			case 6: $dm=181; break; 
			case 7: $dm=212; break; 
			case 8: $dm=243; break; 
			case 9: $dm=273; break; 
			case 10: $dm=304; break; 
			case 11: $dm=334; break; 
			case 12: $dm=365; break; 
		}
		return $dm;
		
		function oyt($oyt)
		{
			if (($oyt>=1) and ($oyt<=31)) $oyt=1;
			if (($oyt>=32) and ($oyt<=59)) $oyt=2;
			if (($oyt>=60) and ($oyt<=90)) $oyt=3;
			if (($oyt>=91) and ($oyt<=120)) $oyt=4;
			if (($oyt>=121) and ($oyt<=151)) $oyt=5;
			if (($oyt>=152) and ($oyt<=181)) $oyt=6;
			if (($oyt>=182) and ($oyt<=212)) $oyt=7;
			if (($oyt>=213) and ($oyt<=243)) $oyt=8;
			if (($oyt>=244) and ($oyt<=273)) $oyt=9;
			if (($oyt>=274) and ($oyt<=304)) $oyt=10;
			if (($oyt>=305) and ($oyt<=334)) $oyt=11;
			if (($oyt>=335) and ($oyt<=365)) $oyt=12;
			
		}
			
			}
	function sana($dan,$gacha)
		{
		$dd=substr($dan,8,2);
		$dm=substr($dan,5,2);
		$dy=substr($dan,0,4);
		
		$dm=oy($dm);
		$dd=$dd+$dm;
		
		$gd=substr($gacha,8,2);
		$gm=substr($gacha,5,2);
		$gy=substr($gacha,0,2);
		$gm=oy($gm);
		$gd=$gd+$gm;
		return $gd-$dd;
		

		}
		
$lang=$_GET['lang'];
if($lang=="")
{
	if($_SESSION['lang']=="")
	{
	$lang='1';		
	}
	else
	{
	$lang=$_SESSION['lang'];	
	}
}
else
{
$_SESSION['lang']=$lang;	
}

?>