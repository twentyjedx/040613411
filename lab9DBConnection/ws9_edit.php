
<?php include "connect.php" ?>

<?php
 $image_file = $_FILES["image"];

 // Exit if no file uploaded
 if (!isset($image_file)) {
     die('No file uploaded.');
 }
 
 // Exit if is not a valid image file
 $image_type = exif_imagetype($image_file["tmp_name"]);
 if (!$image_type) {
     die('Uploaded file is not an image.');
 }
 
 // Move the temp image file to the images/ directory
 move_uploaded_file(
     // Temp image location
     $image_file["tmp_name"],
 
     // New image location
     __DIR__ . "/member_photo/" . $image_file["name"]
 );

$stmt = $pdo->prepare("UPDATE member SET password=?, name=? , address=?, mobile=?, email=? WHERE username=?"); 
$stmt->bindParam(1, $_POST["password"]);
$stmt->bindParam(2, $_POST["name"]);
$stmt->bindParam(3, $_POST["address"]);
$stmt->bindParam(4, $_POST["mobile"]);
$stmt->bindParam(5, $_POST["email"]);
$stmt->bindParam(6, $_POST["username"]);

if ($stmt->execute()) 
echo "แก้ไขสมาชิก " . $_POST["username"] . " สำเร็จ";
?>

