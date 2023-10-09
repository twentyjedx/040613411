<?php
	include "connect.php";
    session_start();
    if (empty($_SESSION["username"]) ) { 
        header("location: login-form.php");
    }
?>

<html>
<head><meta charset="utf-8"></head>
<body>
<?php
   $stmt = $pdo->prepare("SELECT orders.ord_id ,product.pname, product.pdetail, product.price, item.quantity, orders.ord_id, orders.status 
   FROM product 
   JOIN item ON product.pid = item.pid 
   JOIN orders ON item.ord_id = orders.ord_id 
   WHERE orders.username = ?");
$stmt->bindParam(1, $_GET["username"]);
$stmt->execute();

while ($row = $stmt->fetch()) {
   echo "ออเดอร์ที่: " . $row["ord_id"] . "<br>";
   echo "ชื่อสินค้า: " . $row["pname"] . "<br>";
   echo "รายละเอียดสินค้า: " . $row["pdetail"] . "<br>";
   echo "ราคา: " . $row["price"] . " บาท <br>";
   echo "จำนวน: " . $row["quantity"] . " ชิ้น <br>";
   echo "สถานะ: " . $row["status"] . "<br>";
   echo "<hr>\n";
}
?>
</body>
</html>
