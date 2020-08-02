<?
    include './Rss_dbconn.php';

    $title = $_POST['listen_title'];
    $artist = $_POST['listen_artist'];
    //Rss_search.php에서 보낸 값을 저장

    $query = "Select * from song_list where Title = '$title' AND Artist='$artist'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    //song_list테이블에서 제목과 가수가 불러온 값과 일치하는 행을 불러옴
    
    if ($num) { //불러온 값이 존재하면
        $query2 = "INSERT INTO temp VALUES ('$title', '$artist')";
        mysqli_query($conn, $query2);
        //temp테이블에 그 정보를 넣어줌
        echo "<script> location.href='./Rss_usersonglist.php'</script>";
        //Rss_usersonglist.php로 이동
        session_start();
        $_SESSION['stitle'] = $title; 
        $_SESSION['sartist'] = $artist;
        //세션을 이용해 제목과 가수 정보를 Rss_usersonglist.php로 보냄
    } 

    else { //불러온 값이 존재하지 않으면
?>
    <script>
        alert('해당 제목 노래가 없습니다!');
        location.href='./Rss_searchsong.html'; //알림이 뜨면서 Rss_searchsong.html로 이동
    </script>
<?
    }
?>