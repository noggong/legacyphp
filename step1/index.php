<html>
<meta charset="utf-8"/>
<?php
header("Content-Type: text/html; charset=UTF-8");
try {
	$pdo = new PDO("mysql:host=localhost;dbname=salad_store", 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	// 에러 출력
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	/** 주문 내역 가져오기 **/
	$stmt = $pdo->prepare("select  orders.*, menus.id as menu_id, menus.name  as menu_name, users.name as user_name from  orders join menus on orders.menu = menus.id join users on orders.customer = users.id order by ordered_at desc");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo '주문 목록 </br>';
	foreach ($result as $order) {
		echo $order['id'];
		echo $order['user_name'];
		echo $order['menu_name'];
		echo $order['ordered_at'] . '<br/>';
	};

	/** 메뉴목록 가져오기 **/
	$stmt = $pdo->prepare("select * from menus");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo '메뉴 목록 </br>';
	foreach ($result as $menu) {
		echo $menu['name'] . '<br/>';
	};

	/** 손님목록 가져오기 **/
	$stmt = $pdo->prepare("select * from users");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo '손님 목록 </br>';
	foreach ($result as $user) {
		echo $user['name'] . '<br/>';
	};
	
} catch (Exception $e) {
	echo '<xmp>';
	print_r($e);
	echo '</xmp>';
	echo $e->getMessage();
}
?>

</html>

