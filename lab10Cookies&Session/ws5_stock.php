
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
    $stmt = $pdo->prepare("SELECT role FROM member WHERE username = ?");
    $stmt->bindParam(1, $_SESSION["username"]);
    $stmt->execute();
    $member = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($member["role"] == "admin") {
        $stmt = $pdo->prepare("SELECT product.pname,product.stock-SUM(quantity) as inventory FROM item JOIN product ON item.pid=product.pid GROUP BY item.pid");
        $stmt->execute();
    
        while ($row = $stmt->fetch()) {
            echo "ชื่อสินค้า: " . $row ["pname"] . "<br>";
            echo "สินค้าคงเหลือ: " . $row ["inventory"] . "<br>";
            echo "<hr>\n";
        }
    }

?>
</body>
</html>
