<?php
include "connect.php";
$query = "select max(fid) from  z201507050";
$result = mysql_query($query);
$row = mysql_fetch_row($result);
$ip = getenv("REMOTE_ADDR");
if($row[0]) $new_fid = $row[0] + 1;   else   $new_fid = 1;

$signdate = time();
$query =  "INSERT INTO  z201507050 (fid, name, subject, comment, pwd, signdate, up, down, ref, thread, ip) 
	      VALUES ($new_fid, '$name', '$subject', '$comment', '$pwd', $signdate, 0, 0, 0, 'A','$ip')";
$result = mysql_query($query);
if ( ! $result ) { echo("query error");     exit;   }

echo("<meta http-equiv='Refresh' content='0; URL=rboard.php'>");
?>