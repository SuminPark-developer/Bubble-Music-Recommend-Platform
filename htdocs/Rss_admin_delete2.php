<?
    include './Rss_dbconn.php';

    $no = $_GET['dno'];
    //Rss_admin_content2.php에서 받아온 dno를 저장

    $query = "delete from proposal where NO = '$no'";
    mysqli_query($conn, $query);
    //proposal테이블에서 NO가 받아온 dno인 행을 삭제

    echo " <script> alert('건의사항 삭제가 완료 되었습니다.'); location.href='./Rss_admin_proposal.html'; </script>"; //알림이 뜨면서 Rss_admin_proposal.html로 이동
?>
