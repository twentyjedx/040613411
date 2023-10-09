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
        $stmt = $pdo->prepare("SELECT username, COUNT(ord_id) as no_ord FROM orders GROUP BY username");
        $stmt->execute();
    
        while ($row = $stmt->fetch()) {
            echo "ชื่อลูกค้า: " . $row ["username"] . "<br>";
            echo "ออเดอร์ทั้งหมด: " . $row ["no_ord"] . "<br>";
            echo "<a href='ws4_detail.php?username=" . $row ["username"] . "'>รายละเอียด</a>"; 
            echo "<hr>\n";
        }
    }

?>
</body>
</html>
