<?php
$db=mysql_connect("localhost", "read", "123987");
mysql_select_db("airport", $db);
mysql_query("SET NAMES 'cp1251'");
 
$nbag='1'; // ����� �������

// ����� �����
$qre = mysql_query ("select reis from luggage where nbag=$nbag");
$fre = mysql_fetch_array($qre);
$reis = $fre['reis'];
// ��� �������� / �������
$qc = mysql_query ("select kod_en from reis where reis='$reis'");
$fc = mysql_fetch_array($qc);
$kod = $fc['kod_en'];
$logo = $fc['kod_en'];
// ����� �����������
$qp = mysql_query ("select naznach from reis where reis='$reis'");
$fp = mysql_fetch_array($qp);
$punkt = $fp['naznach'];

$s=time ("G:i"); 
$time=date("G:i",$s) . "<br>"; 

$th = date('H');
$tm = date('i');
$time = $th.':'.$tm;

$dd = date('d');
$dm = date('m');
$dm3 = date('Y');
if ($dm==01) {$dm2 = '������';}
else if ($dm==02) {$dm2 = '�������';}
else if ($dm==03) {$dm2 = '�����';}
else if ($dm==04) {$dm2 = '������';}
else if ($dm==05) {$dm2 = '���';}
else if ($dm==06) {$dm2 = '����';}
else if ($dm==07) {$dm2 = '����';}
else if ($dm==8) {$dm2 = '�������';}
else if ($dm==9) {$dm2 = '��������';}
else if ($dm==10) {$dm2 = '�������';}
else if ($dm==11) {$dm2 = '������';}
else if ($dm==12) {$dm2 = '�������';}

$date = $dd.' '.$dm2.' '.$dm3;

if ($reis==0) {
$st="reklama.php";
$st1="0";
} else {
$st="";
$st1="99999";
}
 ?> 
<html>  
<head>  
<META HTTP-EQUIV="refresh" CONTENT='<?php echo $st1?>;URL=<?php echo $st?>'>
<meta content="text/html; charset=Windows-1251" http-equiv="content-type">
  <style>
html { 
	overflow:  hidden; 
	cursor: none;
}
table { 
    border: 0px double #999999; /* ����� ������ ������� */
    border-collapse: collapse; /* ���������� ������ ��������� ����� */
	margin:-10px -10px 0px -10px; /* top right bottom left */
   }
td { 
    padding: 1px; /* ���� ������ ����������� ����� */
    border: 0px solid #999999; /* ������� ������ ����� */
   }
.th { 
    padding: 1px; /* ���� ������ ����������� ����� */
    border: 1px solid #ccc; /* ������� ������ ����� */
	border-width: 0 0 0 1px;
   }
.style1 { 
    background: #156fdf; /* ���� ���� ����� */
   }
.style2 { 
    background: #00ccff; /* ���� ���� ����� */
   }
H20 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 70px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:bold;
	padding: 0 0 0 10px;
   }
H21 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 50px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:normal;
	padding: 0 0 0 10px;
   }
H22 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 40px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:bold;
	float: right;
	padding: 0 10px 0 0 ;
   }
H23 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 60px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:normal;
	margin-right:55px;
	float: right;	
   }
H24 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 170px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:bold;
   } 
H25 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 120px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:normal;
   } 
H26 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 50px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:bold
   }
H27 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 115px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:bold;
   }  
H28 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 28px; /* ������ ������ � ��������� */ 
	color: #fff;
	font-weight:bold;
   }   
  </style>
   
</head>  
<body>
<TABLE BORDER >
        <TR class="style1">
            <TD width="762px" height="188px" COLSPAN=3>
				<h20><b>������ ������</b></h20><br>
				<h21>Luggage output</h21>
			</TD>
            <TD width="362px" height="188px" COLSPAN=1>
				<h22><b><?php echo "$date" ?><b></h22><br>
				<h23><b><?php echo "$time" ?><b></h23>
			</TD>
        </TR>
        <TR class="style2">
            <TD COLSPAN=1 height="340px" width="390px">
				<center><img src="../../img/logo/<?php echo "$logo" ?>.jpg" width="370px" height="170px" style="border-radius: 25px;"></center>
			</TD>
			<TD COLSPAN=3 height="340px">
				<center><h24><?php echo " "."$kod" ?><?php echo "$reis" ?></h24></center>
			</TD>
        </TR>
        <TR class="style2">
            <TD COLSPAN=4 height="200px">
				<h25><center><?php echo "$punkt" ?></center></h25>
			</TD>
        </TR>
</TABLE>

</body>
</html> 



   