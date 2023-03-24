<!DOCTYPE html>
<html>
<body>

<?php
	$str = "0912346789870";
	$pattern = "/[0-9]{9,11}/";
	echo preg_match($pattern, $str);
?>

</body>
</html>
