<?php
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT");
Header("Cache-Control: no-cache, must-revalidate"); 
Header("Pragma: no-cache");
header("Expires: " . gmdate("D, d M Y H:i:s") . " GMT");

$db=mysql_connect("localhost", "read", "123987");
mysql_select_db("airport", $db);
mysql_query("SET NAMES 'cp1251'");

$nst='3';

// ����� �����
$qre = mysql_query ("select reis from stand where nst='$nst'");
$fre = mysql_fetch_array($qre);
$reis = $fre['reis'];
// ����� ����������
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

?>

<html>
<head>
  <meta content="text/html; charset=Windows-1251" http-equiv="content-type">
  <title></title>
  <style>
   table { 
    border: 1px double #999999; /* ����� ������ ������� */
    border-collapse: collapse; /* ���������� ������ ��������� ����� */
   }
   
   th { 
    text-align: left; /* ������������ �� ������ ���� */
    background: #2e8ce3; /* ���� ���� ����� */
    padding: 1px; /* ���� ������ ����������� ����� */
    border: 1px solid #999999; /* ������� ������ ����� */
	color: #eee;
	}
   td { 
    padding: 1px; /* ���� ������ ����������� ����� */
    border: 1px solid #999999; /* ������� ������ ����� */
   }
.button {
	color: #2e8ce3;
	border: solid 1px #ccc;
	background: #eee;
}
.button:hover {
	color: black;
	background: #f47c20;
}
.button:active {
	color: #fcd3a5;
}

  </style>
<script>
function Res1() {
	document.getElementById("reis").selectedIndex = 
	document.getElementById("reis").length = 47;
	document.getElementById("nreg").selectedIndex = 
	document.getElementById("nreg").value = '';
	document.getElementById("okreg").selectedIndex = 
	document.getElementById("okreg").value = '';
}
</script>
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery.maskedinput-1.2.2.min.js" ></script>
<script language="JavaScript" type="text/javascript">
jQuery(function($) {
$.mask.definitions['H']='[012]';
$.mask.definitions['M']='[012345]';
$('#nreg').mask('H9:M9');
$('#okreg').mask('H9:M9');
});
</script>
 </head>
<body>

<center><font size=5 color="#555"><b>������ ����������� �<?php echo $nst;?>:</b></font></center><br>
<FORM id="rowEditForm" ACTION="script.php" method="POST">
<center>
<TABLE border="1" id="demoTable" >
<tr>
<th><center><b>����</b></center></th>
<th WIDTH=120><center><b>�����������</b></center></th>
<th><center><b>������<br>�����������</b></center></th>
<th><center><b>���������<br>������������</b></center></th>
<th><center><b>�����</b></center></th>
<th width='25px'></th>
</tr>
<tr>
<td style="background: #eee";>
<?php
echo "<SELECT onchange='this.form.submit()' NAME='reis' id='reis' >";
echo "<option VALUE='$reis' >$reis</option>";
$r=mysql_query("select reis from reis");
for($i=0; $i<mysql_num_rows($r); $i++) 
{ 
$f=mysql_fetch_array($r);
echo "<option  VALUE='$f[0]'>$f[0]</option>";
} 
echo "</SELECT>";
?>
</td>
<td>
<center><?php echo "$punkt" ?></center>
</td>
<td>
<input style="width: 100px" id="nreg" type="time" name="nreg" class="POST" value="<?php echo "$nreg" ?>"/>
</td>
<td>
<input style="width: 100px" id="okreg" type="time" name="okreg" class="POST" value="<?php echo "$okreg" ?>"/>
</td>
<td>
<SELECT NAME="class" id="class">
        <option  selected VALUE="<?php echo "$class" ?>"><?php echo "$class" ?></option>
        <OPTION VALUE="Economy">Economy</option>
        <OPTION VALUE="Business">Business</option>
</SELECT>
</td>
<td>
<center><input title='�������� ������' type="image" src="../../img/del.gif" OnClick="Res1();Forma1.submit();" onmouseover="this.width=16;this.height=16" onmouseout="this.width=10;this.height=10">  </center>
</td>
</tr>
</table>
<br>
<INPUT class="button" TYPE="submit" name="confirm" VALUE="���������" style="width:150px; height:30px;border-radius: 4px;">
</center>
<br>
<br>
<center><font size=2 color="#888888">&copy; Copyright by Dmitriy Ankudinov</font></center>
</FORM>

</body> 
</html>

