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

	$stmt = $pdo->prepare("dsaflkdsajflkjsal");
	$stmt->execute();


} catch (Exception $e) {
	echo '<xmp>' . print_r($e) . '</xmp>';
}
?>