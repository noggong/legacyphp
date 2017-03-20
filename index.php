<?php
try {
	//mysql 데이터 베이스에 접속한다.
	$pdo = new PDO("mysql:host=localhost;dbname=test_bomi", 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

// 에러 출력
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	/** 주문 내역 가져오기 **/

	//쿼리 만든다
	$stmt = $pdo->prepare("select * From Articles ");
	//쿼리 실행한다
	$stmt->execute();

	//결과값을 가져온다.
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $pdo->prepare("create table User (id int auto_increment primary key  )");
	$stmt->execute();


} catch (Exception $e) {
	echo '<xmp>' . print_r($e) . '</xmp>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>2nd Review</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/css/common.css">
</head>
<body>
<div class="gnb">
	<h1>자유게시판</h1>
	<!-- <h5>숫자 커질수록 글씨 작아져</h5> -->
	<img src="/img/vrr.png" />
</div>
<br/>
<br/>
<div id="wrap">
	<table>
		<colgroup>
			<col width="150px"/>
			<col width=""/>
			<col width="200"/>
		</colgroup>
		<?php
		foreach($result as $data) { ?>

			<tr>
				<td class="blue title"><?php echo $data['writer']?></td>
				<td class="red title"><?php echo $data['title']?></td>
				<td class="green title"><?php echo $data['content']?></td>
			</tr>
		<?php };?>

	</table>

	<table class="paging-table">
		<tr>
			<td>
				<ul>
					<li><?php echo $data['writer']?></li>
					<li>2</li>
					<li>3</li>
				</ul>
			</td>
		</tr>

	</table>
</div>
</body>
</html>