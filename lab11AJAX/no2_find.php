<?php
    $pdo = new PDO("mysql:host=localhost; dbname=blueshop; charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <div>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
        if (!empty($_GET))
        $value = '%' . $_GET["keyword"] . '%';
        $stmt->bindParam(1, $value);
        $stmt->execute();
    ?>
     
    <?php
        while ($row = $stmt->fetch()) :
        ?>
        ชื่อสมาชิก : <?=$row ["username"]?><br>
        ที่อยู่: <?=$row ["address"]?><br>
        อีเมล์ : <?=$row ["email"]?><br>
        เบอร์ :<?=$row ["mobile"]?><br>
        <img src='img/<?=$row["username"]?>.jpg' width='100'><br><hr>
    <?php endwhile; ?>
    </div>
</body>
</html>