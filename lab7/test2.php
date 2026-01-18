<?php
include_once 'klasy/User.php';
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sesja - Test 2 (Obiekt)</title>
</head>
<body>
<h1>Strona testowa 2 (Odczyt obiektu)</h1>

<h3>Informacje o obiekcie w sesji:</h3>
<?php
echo "<p><strong>ID sesji:</strong> " . session_id() . "</p>";

if (isset($_SESSION['user'])) {
    // Deserializacja obiektu z sesji
    $user = unserialize($_SESSION['user']);

    echo "<h4>Dane pobrane z obiektu User:</h4>";
    $user->show(); // Wykorzystanie metody klasy User
} else {
    echo "<p>Brak obiektu user w sesji.</p>";
}

// Usunięcie sesji
session_destroy();
?>

<hr>
<p style="color: red;">Sesja została usunięta.</p>
<p><a href="test1.php">Powrót do strony test1.php</a></p>
</body>
</html>