<html>
<meta charset="utf-8"/>
<?php
header("Content-Type: text/html; charset=UTF-8");
try {
	$pdo = new PDO("mysql:host=localhost;dbname=salad_store", 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	// 에러 출력
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $pdo->prepare("select * from orders");
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $order) {
		echo $order['name'] . '<br/>';
	};
	
} catch (Exception $e) {
	echo '<xmp>';
	print_r($e);
	echo '</xmp>';
	echo $e->getMessage();
}
?>

</html>

