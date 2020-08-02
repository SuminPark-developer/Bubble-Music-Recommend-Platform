<?
    include './Rss_dbconn.php';

    $uid = $_GET['uid'];
    //Rss_content.php에서 보낸 기존 아이디 값을 저장

    $id = $_POST['user_id'];
    $pwd = $_POST['user_password'];
    //content.php에서 보낸 아이디,비밀번호 값을 저장

    $query = "UPDATE member set ID = '$id', Password = '$pwd' where ID = '$uid'";
    mysqli_query($conn, $query);
    //member테이블에서 기존아이디가 uid인 행의 아이디와 비밀번호를 수정할 아이디와 비밀번호로 업데이트해줌

    echo " <script> alert('회원정보가 수정되었습니다. 바뀐 회원정보로 다시 로그인해주세요.'); location.href='./Rss_Mainpage.html'; </script>"; //알림이 뜨면서 Rss_MainPage.html로 이동
?>