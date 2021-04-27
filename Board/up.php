<?php
	include "connect.php";
	$upip = getenv("REMOTE_ADDR");
	$query = "insert into z201507050a values ($number,'$upip')";
	$result = mysql_query($query);
	if(!$result){
	echo "
	<script> 
                        alert('중복으로 추천/비추천 할 수 없습니다.') 
                        history.back(-1)
                    </script>";
	echo("<meta http-equiv='Refresh' content='2; URL=rboard.php'>");
	exit;
	}
	$query = "update z201507050 set up=$up + 1 where uid = $number";
	$result = mysql_query($query);
if(!$result){
echo "$query<br>";
echo mysql_error();
exit;
}
echo("<meta http-equiv='Refresh' content='0; URL=rboard.php'>");
?>