<?php
$db=mysql_connect('localhost', 'root', '');
mysql_select_db('avia', $db);
mysql_query("SET NAMES 'cp1251'");

$st=1;

$qre = mysql_query ("select reis from st where nst='$st'");
$fre = mysql_fetch_array($qre);
$re = $fre['reis'];

if ($re==0) {
$st="reklama1";
} 

?>
<html>
<head>
  <META HTTP-EQUIV="refresh" CONTENT='60;URL=<?php echo $st?>.php'>
  <meta content="text/html; charset=Windows-1251" http-equiv="content-type">
  <title></title>
  <style>

H10 {
    font-family: 'Lucida Sans Unicode', Times, serif; /* ��������� ������ */ 
    font-size: 70px; /* ������ ������ � ��������� */ 
	color: #FFFF33;
	margin-top: 10%;
	margin-left: -3%;
   }
H11 {
    font-family: 'Lucida Sans Unicode', Times, serif; /* ��������� ������ */ 
    font-size: 30px; /* ������ ������ � ��������� */ 
	color: #777777;
	margin-top: 10%;
	margin-left: -3%;
   }      
</style>
</head>
<body bgcolor='#99CCFF'>
<br>

<center><img src=logo\logo.png></center>
<br>

<center><img src=logo\newyear\5.gif></center>
<br>

<center><h10>��� �����������</h10></center>
<br>
</body>
</html>


