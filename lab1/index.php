<?php
$n = 4567;
$x = 10.123456789;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pierwszy skrypt PHP</title>
</head>
<body>
<?php echo "<h2>Pierwszy skrypt PHP</h2>"; ?>
<?php echo "<div>
Domyślny format: n=$n, x=$x<br>
Zaokrąglenie do liczby całkowitej x=". round($x) . ", <br>
z trzema cyframi po kropce x=". round($x, 3) . "
</div>";
?>
</body>
</html>