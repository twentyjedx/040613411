<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <form>
        <input type="text" name="keyword">
        <input type="submit" value="ค้นหา">
    </form>
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
        <img src='member_photo/<?=$row["username"]?>.jpg' width='100'><br><hr>
    <?php endwhile; ?>
    </div>
</body>
</html>