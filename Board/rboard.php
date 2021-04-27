<html>
<body>
<a href="postform.php" target="right">글쓰기</a><br>
<?php
include "connect.php";

$num_per_page = 10;
$page_per_block = 3;

$first = $num_per_page*($page-1);

if(! $page) {$page = 1;;}

$result = mysql_query("SELECT count(uid) FROM z201507050");
$total_record = mysql_result($result, 0, 0);

$total_page = ceil($total_record/$num_per_page);

if($total_record) {
	echo("총 서명 : $total_record	($page / $total_page page)");
} else {
	echo("현재 방명록에 서명된 글이 없습니다."); exit;
}

$first = $num_per_page*($page-1);

$result= mysql_query("SELECT *  FROM   z201507050
				  ORDER BY   fid DESC,  thread ASC   
				  LIMIT $first,  $num_per_page");

$article_num = $total_record - $num_per_page * ($page - 1);

echo("<table width=800 border='1'>");
	echo("<tr>");
	echo("<td>번호</td>");
	echo("<td>제목</td>");
	echo("<td>글쓴이</td>");
	echo("<td>작성일</td>");
	echo("<td>조회수</td>");
while($row = mysql_fetch_array($result)) {
	$my_uid = $row[uid];
	$my_subject = $row[subject];
	$my_name = $row[name];
	$my_signdate = date("Y/m/d H:i",$row[signdate]);
	$my_ref = $row[ref];
	$my_thread = $row[thread];

	echo("<tr>");
	echo("<td> $article_num </td>");
	echo("<td>");
		$sp = strlen($my_thread) -1;
		for($j = 0; $j < $sp; $j++){
		echo("&nbsp;&nbsp;&nbsp;");
		}
	echo("<a href=\"view.php?page=$page&number=$my_uid\">$my_subject</a></td>");
	echo("<td>$my_name</td>");
	echo("<td>$my_signdate</td>");
	echo("<td>$my_ref</td>");
echo("</tr>");

$article_num--;
}
echo("</table><br><br>");

$total_block = ceil($total_page/$page_per_block);
$block = ceil($page/$page_per_block);

$first_page = ($block-1)*$page_per_block;
$last_page = $block*$page_per_block;

if($block >= $total_block){
	$last_page = $total_page;
}

if($block > 1){
	$my_page=$first_page;
	echo("<a href=\"rboard.php?page=$my_page\">[이전]</a>");
}
else{
	echo("[이전]");
}

for($direct_page = $first_page+1; $direct_page <= $last_page; $direct_page++){
	if($page == $direct_page){
		echo("<b>[$direct_page]</b>");
	}
	else{
		echo("<a href=\"rboard.php?page=$direct_page\">[$direct_page]</a>");
	}
}

if($block < $total_block){
	$my_page = $last_page+1;
	echo("<a href=\"rboard.php?page=$my_page\">[다음]</a>");
}
else{
	echo("[다음]");
}
?>

</body>
</html>