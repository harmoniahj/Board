<?
include "connect.php";
$query = " select  thread,  right(thread,1)  from  z201507050
		where 	fid = $fid  AND
				length(thread) = length('$thread') + 1  AND
				locate('$thread', thread) = 1
		order by  thread  DESC   LIMIT 1";

$result = mysql_query($query);		
$rows = mysql_num_rows($result);
$ip = getenv("REMOTE_ADDR");
if($rows) {
	$row = mysql_fetch_row($result);
	$t_head = substr($row[0], 0, -1); 	$t_foot = ++$row[1];
	$new_thread = $t_head . $t_foot;
} else {	$new_thread = $thread . "A";
}


$signdate = time();

$query =  "INSERT INTO  z201507050 (fid, name, subject, comment, pwd, signdate, up, down, ref, thread, ip) 
	VALUES ($fid, '$name', '$subject', '$comment', '$pwd', $signdate, 0, 0, 0,'$new_thread','$ip')";
$result = mysql_query($query);
if ( ! $result ) { echo("query error");     exit;   }

echo("<meta http-equiv='Refresh' content='0; URL=rboard.php?page=$page'>");
?>
