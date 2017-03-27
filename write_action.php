<?php
try {

	//mysql 데이터 베이스에 접속한다.
	$pdo = new PDO("mysql:host=localhost;dbname=test_bomi", 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

// 에러 출력
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//	echo 'post : ' . $_POST['writer'] . '<br/>';
//	echo 'get : ' . $_GET['writer'] . '<br/>';
//	echo 'request : ' . $_REQUEST['writer'] . '<br/>';
//	exit;
//	if (empty($_REQUEST['writer'])) {
//		echo " <script>
// 			history.back();
// 		</script>
// 		";
//	}

	//쿼리 만든다
	$sql = "insert into  Articles (writer, title, content, created_at) values ('{$_POST['writer']}', '{$_POST['title']}', '{$_POST['content']}', NOW())";
	$stmt = $pdo->prepare($sql);
//	echo $sql;
	//쿼리 실행한다
	$stmt->execute();

	//결과값을 가져온다.
//	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo '<xmp>' . print_r($result, true) . '</xmp>';
//
//	$stmt = $pdo->prepare("dsaflkdsajflkjsal");
//	$stmt->execute();

	echo " <script>
 			location.href = 'practice.php';
 		</script>
	";

} catch (Exception $e) {
	echo '<xmp>' . print_r($e, true) . '</xmp>';
}
?>