<?
    include './Rss_dbconn.php';

    session_start();
    $title = $_SESSION['stitle'];  
    $artist = $_SESSION['sartist'];
    //세션을 이용해 Rss_temp.php에서 제목,가수 정보를 받음
    $id = $_SESSION['ssid'];  
    //세션을 이용해 Rss_login2.php에서 아이디 정보를 받음
  
    $query = "Select * from song_list where Title = '$title' AND Artist = '$artist'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    //song_list테이블에서 제목과 가수가 일치하는 행을 불러옴

    if ($num) { //불러온 값이 존재하면
        $query2 = "INSERT INTO user_songlist VALUES ('$id', '$title', '$artist', now())";
        mysqli_query($conn, $query2);
        //user_songlist테이블에 불러온 정보와 현재 시간값을 넣어줌
        echo "<script>location.href='./Rss_searchsong.html'</script>";
        //Rss_searchsong.html로 이동 
      }
    
    else {
?>
        <script>
            alert('잘못되었습니다.');
            location.href='./Rss_searchsong.html'; //알림이 뜨면서 Rss_searchsong.html로 이동
        </script>
<?
    }
?>


