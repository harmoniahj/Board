<?
include 'connect.php'; 
    if(isset($_GET['fid'])) { 
        $zNo = $_GET['fid'];
    }

    $sql = 'select subject, comment, name, signdate, ref, up from z201507050 where fid = ' . $zNo;
    $result = mysql_query($conn);

//추천 중복
    //IP주소를 취득한다. 
    $ipAddress = $_SERVER["REMOTE_ADDR"]; //아이피 받아옴
    $ipLong = ip2long($ipAddress); //받아온 아이피 long값으로 변환
 
    //IP가 등록되어있는지 검색 
    $sql2 = "SELECT ip FROM z201507050 WHERE uid=".$zNo;
    $result = mysql_query($conn); 
    $row = mysql_fetch_row($result); 
 
    if($row['uid'] == $_SESSION['id']){//작성자의 IP와 동일 추천X
       echo " 
                    <script> 
                        alert('본인의 게시물은 추천/비추천 할 수 없습니다.') 
                        history.back(-1)
                    </script> 
             ";
    }else{
        }
$up = $up+1;
        mysql_close($conn);
?>