<?php
$db=mysql_connect("localhost", "read", "123987");
mysql_select_db("airport", $db);
mysql_query("SET NAMES 'cp1251'");

$nst='3'; //����� ������

$qre = mysql_query ("select reis from stand where nst=$nst");
$fre = mysql_fetch_array($qre);
$reis = $fre['reis'];

if ($reis==0) {
$st="reklama.php";
$time="30";

} else {
$st="index.php";
$time="0";
}

?>
<html>
<head>
  <META HTTP-EQUIV="refresh" CONTENT='<?php echo $time?>;URL=<?php echo $st?>'>
  <meta content="text/html; charset=Windows-1251" http-equiv="content-type">
  <title></title>
  <style>
html { 
	overflow:  hidden; 
	cursor: none;
}
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
<br>
<br>
<center><img src="../../img/work/logo.png"></center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center><h10>��� �����������</h10></center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<b><center><h11>�������</h11></center>
<center><h11>� ���������</h11></center>
<center><h11>+7(3012)36-36-06</h11></center></b>
</body>
</html>


