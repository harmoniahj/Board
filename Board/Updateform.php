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
	echo "��й�ȣ Ʋ��";
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
�̸�: <input type="text" name="name" size="20" maxlength="12"
	value='<? echo("$my_name") ?>' ><br>
����: <input type="text" name=subject size="50" maxlength="60" 
	value='<? echo("$my_subject") ?>' ><br>

<textarea name="comment" cols="60" rows="10">
<? echo("$Update_comment") ?>
</textarea><br>
��й�ȣ : <input type="password" name="password" size="30" maxlength="30"><br>
<p>
<input type="submit" value="�����ϱ�" >
<input type="reset" value="��  ��">      
</form></body></html>