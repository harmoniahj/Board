<?php
	include "connect.php";
	$query = "select * from z201507050 where uid = '$uid' and pwd = '$pwd'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$my_pwd = $row[pwd];
	$query = "delete from z201507050 where uid = '$uid' and pwd = '$pwd'";
	$result=mysql_query($query);
	if($my_pwd != $pwd){
		echo "비밀번호가 일치하지 않습니다.";
		echo("<meta http-equiv='Refresh' content='2; URL=rboard.php'>");
		exit;
	}
	else{
		echo "게시물이 삭제되었습니다.";
		echo("<meta http-equiv='Refresh' content='2; URL=rboard.php'>");
		exit;
	}
?>