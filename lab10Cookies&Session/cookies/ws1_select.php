<html>
<body>
<?php

if (empty($_COOKIE["lang"])) {
setcookie("lang",$_GET["language"], time() + 10);
}

if (!isset($_COOKIE["lang"])) {
    setcookie("lang",$_GET["language"], time() + 10);

} 
?>
<a href="ws1_main.php">go to main</a>;
</body>
</html>