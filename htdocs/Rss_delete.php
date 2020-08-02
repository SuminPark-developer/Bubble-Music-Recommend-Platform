<?
    include './Rss_dbconn.php';

    $id = $_GET['did'];
    //Rss_content.php에서 받아온 did를 저장

    $query = "delete from member where id = '$id'";
    mysqli_query($conn, $query);
    //member테이블에서 id가 받아온 did인 행을 삭제

    echo " <script> alert('회원 탈퇴가 완료 되었습니다.'); location.href='./Rss_MainPage.html'; </script>"; //알림이 뜨면서 Rss_MainPage.html로 이동
?>
