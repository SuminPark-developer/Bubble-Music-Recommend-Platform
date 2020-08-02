<?
    include './Rss_dbconn.php';

    $no = $_GET['NO'];
    //Rss_admin_proposal.html에서 받아온 건의사항 번호 정보를 저장

    $query = "Select * from proposal where NO = '$no'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result)
    //proposal테이블에서 NO가 받아온 건의사항 번호인 행만 가져옴
?>

<script>
    function del() { //del() 함수
        location.href="./Rss_admin_delete2.php?dno=<? echo $no; ?>"; //회원정보 번호를 dno로 지정해서 Rss_admin_delete2.php로 보냄
    }
</script>

<br>
<center>
    <a href="./Rss_admin_page.html"><img id="bubble_logo" border="0"  src="./bubble_logo.png" alt = "버블로고" style="width:150px; height:50px;"></a> <!--이미지를 클릭하면 Rss_admin_page.html로 이동-->
</center>

<center>
<h2> 건의 내용 삭제 </h2>
<div align="right"><a href="./Rss_admin_page.html">관리자 페이지</a></div> <!--텍스트를 클릭하면 Rss_admin_page.html로 이동-->
<div align="right"><a href="./Rss_MainPage.html">Log Out</a></div> <!--텍스트를 클릭하면 Rss_MainPage.html로 이동-->
    <style type="text/css">
        a {
            color:#000000;
            text-decoration:none;
        }
        a:hover {
            text-decoration:underline;
        }
    </style>
<table width="800" border="1">
    <tr>
        <td>번호</td>
        <td>건의 내용</td>
    </tr>
    <tr>
        <td><input type="text" name="NO" value="<? echo $row['NO'] ?>" readonly/></td> <!--쿼리문에서 가져온 NO 출력-->
        <td><input type="text" name="Opinion" value="<?= $row['Opinion'] ?>" readonly/></td> <!--쿼리문에서 가져온 Opinion 출력-->
    </tr>
    <tr>
    </tr>
    </table>
    <input type="button" value="영구 삭제" Onclick="del()"> <!--버튼을 누르면 del() 함수 실행 -->
</center>
</body>
