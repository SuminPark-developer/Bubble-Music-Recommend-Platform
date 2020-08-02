<head>
    <br>
    <center>
        <a href="./Rss_searchsong.html"><img id="bubble_logo" border="0"  src="./bubble_logo.png" alt = "버블로고" style="width:150px; height:50px;"></a> <!--이미지를 클릭하면 Rss_searchsong.html로 이동-->
    </center>
    <h2 align="center"> 마이페이지 </h2>
    <div align="right"><a href="./Rss_tracklist.html">My Bubble</a></div>
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
</head>

<body>
    <center>
    <table width="800" border="1">
        <tr>
        <td>아이디</td>
        <td>비밀번호</td>
        <td>이름</td>
        <td>전화번호</td>
        </tr>
        <?
        include './Rss_dbconn.php';

        session_start();
        $id = $_SESSION['sid'];
        //세션을 이용해 sid 값을 불러옴

        $query = "Select * from member where ID = '$id'";
        $result = mysqli_query($conn, $query);
        //member테이블에서 ID가 불러온 sid값과 일치하는 행을 불러옴

        while ($row = mysqli_fetch_array($result)) {
            echo"
            <tr>
                <td><a href='Rss_content.php?id=$row[ID]'>$row[ID]</a></td>
                <td>$row[Password]</td>
                <td>$row[Name]</td>
                <td>$row[Tel]</td>
            </tr>";
        }
        //불러온 값을 출력
        //아이디 텍스트를 클릭하면 아이디 정보를 Rss_content.php로 보내줌

        mysqli_close($conn);
        ?>
    </table>
    <br>
    <input type="button" value="건의 하기" onClick="location.href='Rss_proposal.html'"> <!--건의하기 버튼을 누르면 Rss_proposal.html로 이동-->
    <input type="button" value="노래 찾기" onClick="location.href='Rss_searchsong.html'"> <!--노래찾기 버튼을 누르면 Rss_searchsong.html로 이동-->
    </center>
</body>