<html><head></head>
<body>

<?php
	include "connect.php";
	$query = "select * from z201507050  where  uid = $number";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	if(! $result){
		echo mysql_errno().": ".mysql_error();
		exit;
	}
	$uid = $row[uid];
?>
	<h1>���� ����</h1>
<form name="deleteform" method="post" action ="Updateform.php?uid=<? echo("$uid")?>" > 
	��й�ȣ : <input type=password name="pwd" maxlength = 30>
	<input type=submit value = "�Է�">
 </form>
</body>
</html>
