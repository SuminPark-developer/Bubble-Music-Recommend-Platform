<?
    include './Rss_dbconn.php';

    $propose = $_POST['user_proposal'];
    //Rss_proposal.html에서 보낸 건의사항을 저장함

    $query = "INSERT INTO proposal VALUES (null, '$propose')";
    mysqli_query($conn, $query);
    //불러온 proposal과 건의사항번호(null)을 proposal테이블에 추가해줌
    echo "<script>alert('제출 완료!'); location.href='./Rss_main2.php'</script>"; //알림이 뜨면서 Rss_main2.php로 이동
?>
