<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8">
</head>
<body>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "username: " . $row ["username"] . "<br>";
        echo "ชื่อผู้ใช้ : " . $row ["name"] . "<br>";
        echo "รหัสผู้ใช้ : " . $row ["password"] . "<br>";
        echo "ที่อยู่ : " . $row ["address"] . "<br>";
        echo "เบอร์: " . $row ["mobile"] . "<br>";
        echo "อีเมล์: " . $row ["email"] . "<br>";
        echo "<a href='ws9_editform.php?username=". $row ["username"] . "'>แก้ไข</a> ";
        echo "<hr>\n";
    }
?>
</body>
</html>