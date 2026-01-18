<?php
session_start();

// a) Inicjalizacja zmiennych sesyjnych
$_SESSION['username'] = 'kubus';
$_SESSION['fullname'] = 'Kubus Puchatek';
$_SESSION['email'] = 'kubus@stumilowylas.pl';
$_SESSION['status'] = 'ADMIN';
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sesja - Test 1</title>
</head>
<body>
<h1>Strona testowa 1</h1>

<h3>b) Informacje o sesji:</h3>
<?php
echo "<p><strong>ID sesji:</strong> " . session_id() . "</p>";

echo "<h4>Zmienne sesji ($_SESSION):</h4><ul>";
foreach ($_SESSION as $key => $value) {
    echo "<li>$key = $value</li>";
}
echo "</ul>";

echo "<h4>Ciasteczka ($_COOKIE):</h4><ul>";
if (empty($_COOKIE)) {
    echo "<li>Brak ciasteczek</li>";
} else {
    foreach ($_COOKIE as $key => $value) {
        echo "<li>$key = $value</li>";
    }
}
echo "</ul>";
?>

<p><a href="test2.php">Przejdź do strony test2.php</a></p>
</body>
</html>