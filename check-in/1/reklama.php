<?php
$db=mysql_connect("localhost", "read", "123987");
mysql_select_db("airport", $db);
mysql_query("SET NAMES 'cp1251'");

$nst='1'; //����� ������

$qre = mysql_query ("select reis from stand where nst=$nst");
$fre = mysql_fetch_array($qre);
$reis = $fre['reis'];

if ($reis==0) {
$st="noreg.php";
$time="60";
} else { 
$st="index.php";
$time="0";
}
 
//������ ���������� ������ ����������� ������ ������� �� ���������� C:\xampp\htdocs\logo\reklama
$format=array("jpg","JPG","jpeg","JPEG","GIF","gif","PNG","png");
$img_rand=array();
$c1=sizeof($format);
for($i=0; $i<$c1; $i++){
$add_img=glob("../../img/reklama/*.".$format[$i]."");

$img_rand=array_merge((array)$add_img,(array)$img_rand);
}
$c2=sizeof($img_rand);
$rand=rand(0,($c2-1));

?>
<html>
<head>
  <META HTTP-EQUIV="refresh" CONTENT='<?php echo $time?>;URL=<?php echo $st ?>'>
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
<center><img src="../../img/work/logo.png"></center> 
<br>
<br>
<center><?echo "<img src='".$img_rand[$rand]."' height=478px style='border-radius: 15px;'>";?></center>
<br>
<b><center><h11>�������</h11></center>
<center><h11>� ���������</h11></center>
<center><h11>+7(3012)36-36-06</h11></center></b>
<br>
</body>
</html>


