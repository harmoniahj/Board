<?
include "connect.php";
$signdate = time();

$query =  "update z201507050 set name='$name', subject='$subject', comment='$comment',
 signdate='$signdate', pwd='$password' where uid='$uid'";
$result=mysql_query($query);
if(!$result) {
	echo mysql_error();
	exit;
}
echo("������ �Ϸ�Ǿ����ϴ�.");
echo("<meta http-equiv='Refresh' content='2; URL=rboard.php'>");
?>
