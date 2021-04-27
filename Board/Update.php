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
echo("수정이 완료되었습니다.");
echo("<meta http-equiv='Refresh' content='2; URL=rboard.php'>");
?>
