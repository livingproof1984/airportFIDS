<html>
<head>
	
  <meta content="text/html; charset=Windows-1251" http-equiv="content-type">
  <title></title>
  <style>
.st { 
	width: 524px; 
	height: 140px;

	margin-left:-0.8%;
	background:#d4d4d4;
   }
   
   .st2 { 
	width: 524px; 
	height: 220px;

	margin-left:-0.8%;
	background:#d4d4d4;
   }
   
   .st3 { 
	width: 524px; 
	height: 190px;

	margin-left:-0.8%;
	background:#d4d4d4;
   }
   </style>
 </head>
<body> 
<center>

<div class="st">
<form action="reis.php" method="POST">
<center>
<br>
<b>��������� ���������� �� ��������:</b>
<hr style="width:300px;">
������� ����� ������: <input style="width: 10%" id="nst" type="text" name="nst" class="POST" /> ������� ����� �����: <input style="width: 11%" id="reis" type="text" name="reis" class="POST" /><br>
<hr style="width:300px;">
<font size=2 color=red>�� ��������� ������� ��������� ��� �������� �������!</font><br><br>
<input style="width: 10%" type="submit" id="confirm" value="����" name="confirm" />
</form>
</div>
<font size=1 color=white>1</font><br>
<div class="st2">
<form action="zader.php" method="POST">
<br>
<b>��������:</b>
<hr style="width:300px;">
�������� �� ������: <input style="width: 10%" id="znst" type="text" name="znst" class="POST" /><br> 
<br>
�������� �����: <input style="width: 10%" id="zreis" type="text" name="zreis" class="POST" /><br>
<br>
�������� ��: <input style="width: 10%" id="ztime" type="text" name="ztime" class="POST" /><br>
<hr style="width:350px;">
<input style="width: 10%" type="submit" id="confirm" value="����" name="confirm" />

</form>
</div>
<font size=1 color=white>1</font><br>
<br>
<br>
<input type="submit" value="�������� ���������� �� ������� �����������" onclick=" location.href='http://172.17.10.120/admin/streg.php'" ></input>
<br>
<br>
<input type="submit" value="����� ���� �������� �1" onclick=" location.href='http://172.17.10.120/admin/zd.php'" ></input>
<br>
<br>
<input type="submit" value="����� ���� �������� �2" onclick=" location.href='http://172.17.10.120/admin/zd2.php'" ></input>
<br>
<br>
<input type="submit" value="����� �������" onclick=" location.href='http://172.17.10.120/admin/tabp.php'" ></input>
   </center>

   </body> 
</html>

