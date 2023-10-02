<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]);
    $stmt->execute(); 
    $row = $stmt->fetch(); 
?>
<html>
<head><meta charset="utf-8">
</head>
<body>
<form action="ws9_edit.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="username" value="<?=$row["username"]?>">
รหัสผู้ใช้: <input type="text" name="password" value="<?=$row["password"]?>"><br>
ชื่อสมาชิก: <input type="text" name="name" value="<?=$row["name"]?>"><br>
ที่อยู่: <input type="text" name="address" value="<?=$row["address"]?>"><br>
เบอร์: <input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
อีเมล์: <input type="email" name="email" value="<?=$row["email"]?>"><br><br>
รูปภาพ: <input type="file" name="image" id="image"><br><br>
<input type="submit" value="แก้ไขสมาชิก" >
</form>
</body>
</html>
