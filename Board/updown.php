<?
include 'connect.php'; 
    if(isset($_GET['fid'])) { 
        $zNo = $_GET['fid'];
    }

    $sql = 'select subject, comment, name, signdate, ref, up from z201507050 where fid = ' . $zNo;
    $result = mysql_query($conn);

//��õ �ߺ�
    //IP�ּҸ� ����Ѵ�. 
    $ipAddress = $_SERVER["REMOTE_ADDR"]; //������ �޾ƿ�
    $ipLong = ip2long($ipAddress); //�޾ƿ� ������ long������ ��ȯ
 
    //IP�� ��ϵǾ��ִ��� �˻� 
    $sql2 = "SELECT ip FROM z201507050 WHERE uid=".$zNo;
    $result = mysql_query($conn); 
    $row = mysql_fetch_row($result); 
 
    if($row['uid'] == $_SESSION['id']){//�ۼ����� IP�� ���� ��õX
       echo " 
                    <script> 
                        alert('������ �Խù��� ��õ/����õ �� �� �����ϴ�.') 
                        history.back(-1)
                    </script> 
             ";
    }else{
        }
$up = $up+1;
        mysql_close($conn);
?>