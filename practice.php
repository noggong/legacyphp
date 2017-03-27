<?php
//try {

//mysql 데이터 베이스에 접속한다.
$pdo = new PDO("mysql:host=localhost;dbname=test_bomi", 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

// 에러 출력
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/** 주문 내역 가져오기 **/

if ($_GET['order'] != 'id' && $_GET['order'] != 'writer') {
$order = 'id';
} else {
$order = $_GET['order'];
}

if ($_GET['orderType'] != 'asc' && $_GET['orderType'] != 'desc') {
$orderType = 'desc';
} else {
$orderType = $_GET['orderType'];
}

//쿼리 만든다
$stmt = $pdo->prepare("select * From Articles Order by " . $order . " " . $orderType);
//쿼리 실행한다
$stmt->execute();

//결과값을 가져온다.
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<td>작성자</td><td>제목</td><td>작성일</td>
		</tr>
		<?php
		foreach ($result as $data) {
			echo '<tr>';
			echo '<td>' . $data['writer'] . '</td><td>' . $data['title'] . '</td><td>' . $data['created_at'] . '</td>';
			echo '</tr>';
		}
		?>
		</table>
</body>
</html>





//
//	$stmt = $pdo->prepare("dsaflkdsajflkjsal");
//	$stmt->execute();


//} catch (Exception $e) {
//	echo '<xmp>' . print_r($result) . '</xmp>';
//}
?>