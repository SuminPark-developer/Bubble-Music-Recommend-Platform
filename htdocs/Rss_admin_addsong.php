<?
	include './Rss_dbconn.php';

	$title = $_POST['addsong_title'];
	$artist = $_POST['addsong_artist'];
	$release_date = $_POST['addsong_release_date'];
	$genre = $_POST['addsong_genre'];
	$gender = $_POST['addsong_gender'];
	$group = $_POST['addsong_group'];
	//Rss_admin_addsong.html에서 제출한 노래 정보를 저장

	$query = "Select * from song_list where Title = '$title' AND Artist = '$artist'";
	$result = mysqli_query($conn, $query);
	$num = mysqli_num_rows($result);
	//song_list테이블에서 Title과 Artist가 Rss_admin_addsong.html에서 받아온 제목,가수 정보와 일치하는 행을 불러옴

	if (!$num) { //일치하는 열이 없을 경우(중복되지 않을 경우)
    	$query2 = "INSERT INTO song_list VALUES ('$title', '$artist', '$release_date', '$genre', '$gender', '$group')"; //Rss_admin_addsong.html에서 받아온 노래 정보를 song_list테이블에 저장해줌
		mysqli_query($conn, $query2);
		echo "<script>alert('노래 등록 완료!'); location.href='./Rss_admin_addsong.html'</script>"; //알림이 뜨면서 Rss_admin_addsong.html로 이동
	} 

	else { //일치하는 열이 있을 경우(중복될 경우)
?>
<script>
	alert('이미 등록된 노래입니다!'); 
	location.href = './Rss_admin_addsong.html';
	//알림이 뜨면서 Rss_admin_addsong.html로 이동
</script>
<?
	}
?>
<!--중복검사를 제목,가수로만 한 이유 : 제목,가수가 동시에 일치하는 노래가 없기 때문-->