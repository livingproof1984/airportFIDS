<?php
$db=mysql_connect("localhost", "read", "123987");
mysql_select_db("airport", $db);
mysql_query("SET NAMES 'cp1251'");
 
$nst='M2'; //����� ������

// ����� �����
$qre = mysql_query ("select reis from stand where nst='$nst'");
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
// �����
$ql = mysql_query ("select class from stand where nst='$nst'");
$fl = mysql_fetch_array($ql);
$class = $fl['class'];
// ������ �����������
$qp = mysql_query ("select nach_reg from reis where reis='$reis'");
$fp = mysql_fetch_array($qp);
$nreg = $fp['nach_reg'];
// ��������� �����������
$qp = mysql_query ("select okon_reg from reis where reis='$reis'");
$fp = mysql_fetch_array($qp);
$okreg = $fp['okon_reg'];

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
	margin:-10px;
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
    background: #00BFFF; /* ���� ���� ����� */
   }
H20 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 40px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:bold;
	padding: 0 0 0 10px;
   }
H21 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 34px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:normal;
	padding: 0 0 0 10px;
   }
H22 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 34px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:bold;
	float: right;
	padding: 0 10px 0 0 ;
   }
H23 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 50px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:normal;
	margin-right:55px;
	float: right;	
   }
H24 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 190px; /* ������ ������ � ��������� */ 
	color: #f7f21a;
	font-weight:bold;
   } 
H25 {
    font-family: 'Arial', Times, serif; /* ��������� ������ */ 
    font-size: 100px; /* ������ ������ � ��������� */ 
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
    font-size: 23px; /* ������ ������ � ��������� */ 
	color: #333;
	font-weight:bold;
   }   
  </style>
   
</head>  
<body>
<TABLE BORDER >
        <TR class="style1">
            <TD COLSPAN=2 width="720px" height="115px">
				<h20><b>������ ����������� <?php echo $nst?></b></h20><br>
				<h21>Check-in</h21>
			</TD>
            <TD width="304px">
				<h22><b><?php echo "$date" ?><b></h22><br>
				<h23><b><?php echo "$time" ?><b></h23>
			</TD>
        </TR>
        <TR class="style2">
            <TD COLSPAN=3 height="246px">
				<h24><center><?php echo "$kod"."$reis" ?></center></h24>
			</TD>
        </TR>
        <TR class="style1">
            <TD COLSPAN=3 height="130px">
				<h25><center><?php echo "$punkt" ?></center></h25>
			</TD>
        </TR>
		<TR class="style2">
            <TD ROWSPAN=2 height="278px" width="410px">
				<center><img src="../../img/logo/<?php echo "$logo" ?>.jpg" width="370px" height="170px" style="border-radius: 25px;"></center>
			</TD> 
			<TD COLSPAN=2 height="70px">
				<h26><center><?php echo "$class"." "."class" ?></center></h26> 
			</TD> 
        </TR>
        <TR class="style2">
            <TD>
				<h28><center>������ �����������:</center></h28>
				<h28><center>Registration begins:</center></h28>
				<h27><center><?php echo "$nreg" ?></center></h27>
			</TD> 
			<Td class="th">
				<h28><center>��������� �����������:</center></h28>
				<h28><center>The end registration:</center></h28>
				<h27><center><?php echo "$okreg" ?></center></h27>
			</Td> 
        </TR>
		
		
</TABLE>
 
</body>
</html> 



   