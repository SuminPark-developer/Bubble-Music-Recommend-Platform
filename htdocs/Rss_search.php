<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song search result</title>
    <br>
    <center>
        <a href="./Rss_searchsong.html"><img id="bubble_logo" border="0"  src="./bubble_logo.png" alt = "버블로고" style="width:150px; height:50px;"></a> <!--이미지를 클릭하면 Rss_searchsong.html로 이동-->
    </center>
    <center><h1><a href="./Rss_searchsong.html">검색 결과</a></h1></center>
    <div align="right"><a href="./Rss_tracklist.html">My Bubble</a></div> <!--텍스트를 클릭하면 Rss_tracklist.html로 이동-->
    <div align="right"><a href="./Rss_main2.php">My page</a></div> <!--텍스트를 클릭하면 Rss_main2.php로 이동-->
    <div align="right"><a href="./Rss_user_tracklist.php">Community</a></div> <!--텍스트를 클릭하면 Rss_user_tracklist.php로 이동-->
    <div align="right"><a href="./Rss_MainPage.html">Log Out</a></div> <!--텍스트를 클릭하면 Rss_MainPage.html로 이동-->
    <style type="text/css">
    table {
        border: 0;
        border-collapse: collapse;
        border-spacing: 0;
    }
    table td, table th {
        border: 1px solid;
        padding: 2px 5px 2px 5px;
    }
    .text-center { text-align: center; }
    .text-right { text-align: right; }
    a {
        color:#000000;
        text-decoration:none;
    }
    a:hover {
        text-decoration:underline;
    }
    </style>
    <script>
    function btn() { //btn() 함수
        alert('노래를 듣습니다');
        document.listen.submit(); //알림이 뜨면서 제출 
    }
    </script>
</head>

<body>
    <center>
        <form name="listen" action="Rss_temp.php" method="post"> <!--Rss_temp.php로 양식을 보냄-->
            <label for="">노래 제목: </label> <input type="text" name="listen_title"><br> <!--노래 제목 입력칸-->
            <label for="">가수 이름: </label> <input type="text" name="listen_artist"><br> <!--가수 이름 입력칸-->
            <br><input type="button" value="듣기" onClick="btn()"> <!--듣기 버튼을 누르면 btn() 함수 실행-->
        </form>
        <br>

        <?
        $title = $_POST['song_title'];
        $artist = $_POST['song_artist'];
        $genre = $_POST['song_genre'];
        $gender = $_POST['song_gender'];
        //Rss_searchsong.html 또는 Rss_searchsong2.html 또는 Rss_searchsong3.html 또는 Rss_searchsong4.html 에서 보낸 제목,가수,장르,성별값을 저장

        /* Load DB */
        $conn1 = mysqli_connect('localhost', 'root', '0000', 'recommend_song');
        if ( !$conn1 ) die('DB Error');
            
        /* Set to UTF-8 Encoding */
        mysqli_query($conn1, 'set session character_set_connection=utf8;');
        mysqli_query($conn1, 'set session character_set_results=utf8;');
        mysqli_query($conn1, 'set session character_set_client=utf8;');

        /* Load data */
        $query = "Select * from song_list where Title LIKE '%$title%' AND Artist LIKE '%$artist%' AND Genre LIKE '%$genre%' AND Gender LIKE '%$gender%'" ;
        $result = mysqli_query($conn1, $query);
        //song_list테이블에서 제목,가수,장르,성별이 Rss_searchsong.html에서 불러온 값을 포함하는 행을 불러옴

        echo '<table class="text-center"><tr>' .
        '<th>노래 제목</th><th>가수</th><th>발매일</th><th>장르</th><th>성별</th><th>솔로/그룹</th>' .
        '</tr>';
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td><a>" . $row['Title'] . "</a></td>" .
                '<td>' . $row['Artist'] . '</td>' .
                '<td>' . $row['Release_date'] . '</td>' .
                '<td>' . $row['Genre'] . '</td>' .
                '<td>' . $row['Gender'] . '</td>' .
                '<td>' . $row['Group'] . '</td></tr>';
        }  
        //불러온 song_list테이블을 출력

        echo '</table>';
        mysqli_close($conn1);
        ?>
    </center>
</body>

</html>