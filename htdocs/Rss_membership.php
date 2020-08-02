<?
    include './Rss_dbconn.php';

    $id = $_POST['user_id']; 
    $pwd = $_POST['user_password'];
    $name = $_POST['user_name'];
    $tel = $_POST['user_telephone'];
    //Rss_membership.php에서 아이디,비밀번호,이름,전화번호를 받아서 저장

    $query = "Select * from member where id = '$id' OR tel = '$tel'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    //member테이블에서 아이디 또는 전화번호가 Rss_membership.php에서 불러온 아이디 또는 비밀번호와 같은 행을 불러옴 

    if (!$num) { //불러온 값이 존재하지 않으면
        $query2 = "INSERT INTO member VALUES (null, '$id', '$pwd', '$name', '$tel')"; //Rss_membership.php에서 받아온 정보 + 회원번호(null)를 member테이블에 저장
        mysqli_query($conn, $query2);
        echo "<script>alert('회원가입완료!'); location.href='./Rss_MainPage.html'</script>"; //알림이 뜨면서 Rss_MainPage.html로 이동
    } 
    
    else { //불러온 값이 존재하면
?>
    <script>
        alert('해당 아이디 또는 전화번호가 이미 존재함!'); 
        location.href='./Rss_membership.html'; //알림이 뜨면서 Rss_membership.html로 이동
    </script>
<?
    }
?>