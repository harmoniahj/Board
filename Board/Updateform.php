<?
include "connect.php";
$query = "select * from z201507050  where  uid = $uid and pwd = '$pwd'";
$result = mysql_query($query);
if(! $result){
		echo mysql_errno().": ".mysql_error();
		exit;
	}
$row = mysql_fetch_array($result);
if($row[uid] == null){
	echo "비밀번호 틀림";
	echo("<meta http-equiv='Refresh' content='2; URL=rboard.php'>");
	exit;
	}

$my_uid = $row[uid];
$my_name = $row[name];	$my_subject = $row[subject];
$my_comment = $row[comment];	$my_fid = $row[fid];
$my_thread = $row[thread];

$my_comment = $my_comment;
$my_comment = eregi_replace("\n", "\n",$my_comment);
$Update_comment = $my_comment;
?>
<html>
<body>
<form name="signform" method="post" 
      action="Update.php?uid=<? echo("$my_uid")?>" >
이름: <input type="text" name="name" size="20" maxlength="12"
	value='<? echo("$my_name") ?>' ><br>
제목: <input type="text" name=subject size="50" maxlength="60" 
	value='<? echo("$my_subject") ?>' ><br>

<textarea name="comment" cols="60" rows="10">
<? echo("$Update_comment") ?>
</textarea><br>
비밀번호 : <input type="password" name="password" size="30" maxlength="30"><br>
<p>
<input type="submit" value="수정하기" >
<input type="reset" value="취  소">      
</form></body></html>