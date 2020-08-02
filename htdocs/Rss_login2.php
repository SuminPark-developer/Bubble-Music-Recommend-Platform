<?
    include './Rss_dbconn.php';

    $id = $_POST['user_id'];
    $id2 = $_POST['user_id'];
    $pwd = $_POST['user_password'];
    $pwd2 = $_POST['user_password'];
    //Rss_test2.html에서 받은 아이디,비밀번호를 저장

    session_start();
    $_SESSION['sid'] = $id2;
    //세션을 이용해 $id2를 main2.php로 보냄

    $query = "Select * from member where ID = '$id' and Password='$pwd'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    //member테이블의 아이디,비밀번호와 Rss_test2.html에서 받아온 아이디,비밀번호가 일치하는 행을 불러옴

    if ($num) { //불러온 값이 존재할 경우
        if($id == 'admin') { //아이디가 admin일 경우
        echo "<script>alert('관리자 계정 로그인 완료!'); location.href='./Rss_admin_page.html'</script>"; //알림이 뜨면서 Rss_admin_page.html로 이동(관리자 페이지)
        }

        else { //그 외의 아이디일 경우
        echo "<script>alert('로그인 완료!'); location.href='./Rss_searchsong.html'</script>"; //알림이 뜨면서 Rss_searchsong.html로 이동(회원 페이지)
        }

        $id3 = $_POST['user_id']; 
        $_SESSION['ssid'] = $id3; 
        //Rss_test2.html에서 받은 아이디를 세션을 이용해 Rss_usersonglist.php로 보냄

        $id4 = $_POST['user_id'];
        $_SESSION['tracklist_id'] = $id4;
        //Rss_test2.html에서 받은 아이디를 세션을 이용해 Rss_tracklist.html로 보냄
    }
    
    else { //불러온 값이 존재하지 않을 경우(아이디와 비밀번호가 일치하지 않거나 회원정보가 없음)
?>
    <script>
    alert('아이디 혹은 비밀번호가 잘못되었습니다.'); 
    location.href='./Rss_test2.html'; //알림이 뜨면서 Rss_test2.html로 이동
    </script>
<?
    }
?>