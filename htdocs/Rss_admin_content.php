<?
    include './Rss_dbconn.php';

    $cid = $_GET['id'];
    //Rss_admin_member.html에서 받아온 아이디를 저장

    $query = "Select * from member where id = '$cid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result)
    //member테이블에서 id가 받아온 아이디인 행을 가져옴

?>

<script>
    function del() { //del() 함수
        location.href = "./Rss_admin_delete.php?did=<? echo $cid; ?>";
    } //did값과 함께 Rss_admin_delete.php로 이동
</script>

<body>
    <br>
    <center>
        <a href="./Rss_admin_page.html"><img id="bubble_logo" border="0" src="./bubble_logo.png" alt="버블로고" 
            style="width:150px; height:50px;"></a> <!--이미지를 클릭하면 Rss_admin_page.html로 이동-->
    </center>

    <center>
        <h2> 회원정보 </h2>
        <div align="right"><a href="./Rss_MainPage.html">Log Out</a></div> <!--텍스트를 클릭하면 Rss_MainPage.html로 이동-->
        <style type="text/css">
        a {
            color: #000000;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        </style>
        <form name="frm_content" action="Rss_admin_update.php?uid=<? echo $cid; ?>" method="post"> <!--양식을 uid 정보와 함께 Rss_admin.update.php로 보냄-->
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
            <td><input type="submit" value="수정"></td> <!--수정 버튼을 누르면 양식이 제출됨-->
            <td><input type="button" value="삭제" Onclick="del()"></td> <!--삭제 버튼을 누르면 del() 함수 실행-->
            </tr>
        </table>
        </form>
    </center>
</body>