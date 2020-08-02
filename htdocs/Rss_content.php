<?
    include './Rss_dbconn.php';

    $cid = $_GET['id'];

    $query = "Select * from member where id = '$cid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result)
    //member테이블에서 아이디가 받아온 id와 일치하는 행을 불러옴
?>

<script>
    function del() { //del() 함수
        location.href="./Rss_delete.php?did=<? echo $cid; ?>";
        //did값과 함께 Rss_delete.php로 이동
    }
</script>

<body>
    <center>
        <h2> 회원정보 </h2>
        <div align="right"><a href="./Rss_MainPage.html">Log Out</a></div>
        <style type="text/css">
        a {
            color:#000000;
            text-decoration:none;
        }
        a:hover {
            text-decoration:underline;
        }
        </style>
        <form name="form_content" action="Rss_update.php?uid=<? echo $cid; ?>" method="post"> <!--Rss_update.php로 입력받은 값을 제출-->
            <table width="800" border="1">
            <tr>
                <td>아이디</td>
                <td>비밀번호</td>
            </tr>
            <tr>
                <td><input type="text" name="user_id" value="<? echo $row['ID'] ?>"></td> <!--수정할 아이디 입력칸--> 
                <td><input type="text" name="user_password" value="<?= $row['Password'] ?>"></td> <!--수정할 비밀번호 입력칸-->
            </tr>
            <tr>
                <td><input type="submit" value="수정"></td> 
                <td><input type="button" value="삭제" Onclick="del()"></td> <!--삭제 버튼을 누르면 del() 함수 실행-->
            </tr>
            </table>
        </form>
    </center>
</body>
