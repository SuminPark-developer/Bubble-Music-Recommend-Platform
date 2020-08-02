<?
    include './Rss_dbconn.php';

    $uid = $_GET['uid'];
    //Rss_admin_content.php에서 기존 회원아이디(uid)를 받아옴

    $id = $_POST['user_id'];
    $pwd = $_POST['user_password'];
    //Rss_admin_content.php에서 수정할 아이디와 비밀번호를 받아옴

    $query = "UPDATE member set ID = '$id', Password = '$pwd' where ID = '$uid'";
    mysqli_query($conn, $query);
    //member테이블에서 기존아이디가 uid인 행의 아이디와 비밀번호를 수정할 아이디와 비밀번호로 업데이트해줌

    echo " <script> alert('회원정보가 수정되었습니다.'); location.href='./Rss_admin_member.html'; </script>"; //알림이 뜨면서 Rss_admin_member.html로 이동
?>
