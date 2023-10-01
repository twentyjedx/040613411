<?php include "connect.php" ?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<div style="display:flex">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
    ?>
<?php while ($row = $stmt->fetch()) : ?>
    <div style="padding: 15px; text-align: center ;">
        <a  href="detail.php?username=<?=$row["username"]?>">
            <img src='member_photo/<?=$row["username"]?>.jpg' width='100'><br>
            <?=$row ["username"]?>
        </a><br>
    </div>
<?php endwhile; ?>
</div>
</body>
</html>

