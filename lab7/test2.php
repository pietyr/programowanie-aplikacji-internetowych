<?php
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sesja - Test 2</title>
</head>
<body>
<h1>Strona testowa 2</h1>

<h3>e) Informacje o sesji przed usunięciem:</h3>
<?php
echo "<p><strong>ID sesji:</strong> " . session_id() . "</p>";

echo "<h4>Zmienne sesji ($_SESSION):</h4><ul>";
if (empty($_SESSION)) {
    echo "<li>Brak zmiennych sesji</li>";
} else {
    foreach ($_SESSION as $key => $value) {
        echo "<li>$key = $value</li>";
    }
}
echo "</ul>";

// Usunięcie sesji
session_destroy();

// b) Wyświetlenie ciasteczek
echo "<h4>Ciasteczka ($_COOKIE):</h4><ul>";
foreach ($_COOKIE as $key => $value) {
    echo "<li>$key = $value</li>";
}
echo "</ul>";
?>

<p style="color: red;">Sesja została usunięta (session_destroy).</p>
<p><a href="test1.php">Powrót do strony test1.php</a></p>

</body>
</html>