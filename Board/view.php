<html>
<body>
<?php
include "connect.php";

$query = "select name,subject,comment,signdate,ref,fid,up,down FROM z201507050 where uid=$number";
$result = mysql_query($query);
if(!$result){
	echo "$query<br>";
	echo mysql_error();
	exit;
}

$row = mysql_fetch_array($result);


$my_subject = $row[subject];
$my_name = $row[name];
$my_signdate = date("Y�� m�� d�� H�� i��",$row[signdate]);
$my_comment = $row[comment];
$my_ref = $row[ref];
$my_comment = htmlspecialchars($my_comment);
$my_comment = nl2br($my_comment);
$ip = $row[ip];
$up = $row[up];
$down = $row[down];
$result = mysql_query("update z201507050 set ref=$my_ref + 1 where uid = $number");

?>

<table border=1 width=600>
<tr><td align=center> <? echo("$my_subject") ?>
<tr><td> �۾��� : <? echo("$my_name") ?>
<tr><td> �ø��ð� : <? echo("$my_signdate")?>
<tr><td> <? echo("$my_comment")?>
<tr><td align=right>

<a href="up.php?number=<?php echo($number) ?>&up=<?php echo($up) ?>"> <img src="1.jpg" width="50"></a>
<a href="down.php?number=<?php echo($number) ?>&down=<?php echo($down) ?>"> <img src="2.jpg" width="50"></a>
<?
echo ("
	��õ : $up &nbsp&nbsp ����õ : $down</td></tr><tr><td align=right>
	<a href=\"replyform.php?page=$page&number=$number\">���</a> &nbsp;&nbsp;
	<a href=\"updatepwd.php?page=$page&number=$number\">����</a> &nbsp;&nbsp;
	<a href=\"delete_form.php?page=$page&number=$number\">����</a> &nbsp;&nbsp;
");
?>
</td></tr>
</table>

</body>
</html>