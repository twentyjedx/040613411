<html>
<head><meta charset="UTF-8">
<script>
    function confirmRedirect() {      
    var ans = confirm("ต้องการเพิ่มผู้ใช้นี้"); 
    if (ans==true) 
        document.location="ws8_redirect.php"; 
}
</script>
</head>
<body>

<form action="ws8_redirect.php" method="post">
    username: <input type="text" name="username"><br>
    รหัสผู้ใช้: <input type="text" name="password"><br>
    ชื่อสมาชิก: <input type="text" name="name"><br>
    ที่อยู่: <input type="text" name="address" ><br>
    เบอร์: <input type="text" name="mobile"><br>
    อีเมล์: <input type="email" name="email"><br><br>
    <input type="submit" value="เพิ่มสมาชิก" onclick="confirmRedirect()">
</form>
</body>
</html>