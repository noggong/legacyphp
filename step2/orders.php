<html>
<meta charset="utf-8"/>
<?php
header("Content-Type: text/html; charset=UTF-8");
try {
	$pdo = new PDO("mysql:host=localhost;dbname=salad_store", 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	// 에러 출력
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $pdo->prepare("select  orders.*, menus.id as menu_id, menus.name  as menu_name, users.name as user_name from  orders join menus on orders.menu = menus.id join users on orders.customer = users.id order by ordered_at desc");

	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $order) {
		echo $order['id'];
		echo $order['user_name'];
		echo $order['menu_name'];
		echo $order['ordered_at'] . '<br/>';
	};
	
} catch (Exception $e) {
	echo '<xmp>';
	print_r($e);
	echo '</xmp>';
	echo $e->getMessage();
}
?>

</html>

