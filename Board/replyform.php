<?
include "connect.php";
$query = "select * from z201507050  where  uid = $number";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$my_name = $row[name];					$my_subject = $row[subject];
$my_comment = $row[comment];			$my_fid = $row[fid];
$my_thread = $row[thread];

$my_comment = ":" . $my_comment;
$my_comment = eregi_replace("\n", "\n:", $my_comment);
$reply_comment = $my_name . "���� ���Դϴ�.\n\n" . $my_comment;
?>
<html>
<body>
<form name="signform" method="post" 
      action="reply.php?page=<? echo("$page") ?>&fid=<? echo("$my_fid") ?>&thread=<?
              echo( "$my_thread" ) ?>" >
�̸�: <input type="text" name="name" size="20" maxlength="12"><br>
����: <input type="text" name=subject size="50" maxlength="60" 
	value='&nbsp; [Re] <? echo("$my_subject") ?>' ><br>

<textarea name="comment" cols="60" rows="10">
<? echo("$reply_comment") ?>
</textarea><br>
��й�ȣ : <input type="password" name="pwd" size="30" maxlength="30"><br>
<p>
<input type="submit" value="�亯�۾���" >
<input type="reset" value="��  ��">      
</form></body></html>