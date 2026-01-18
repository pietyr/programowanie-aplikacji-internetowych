<?php
include_once 'klasy/User.php';
session_start();

// Tworzenie obiektu User
$user = new User('kubus', 'haslo123', 'Kubus Puchatek', 'kubus@stumilowylas.pl');
$user->setStatus(User::STATUS_ADMIN);

// Zapamiętanie obiektu w sesji pod kluczem "user" po uprzedniej serializacji
$_SESSION['user'] = serialize($user);
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sesja - Test 1 (Obiekt)</title>
</head>
<body>
<h1>Strona testowa 1 (Zapis obiektu)</h1>

<h3>Informacje o sesji:</h3>
<?php
echo "<p><strong>ID sesji:</strong> " . session_id() . "</p>";

echo "<h4>Zmienne sesji:</h4><pre>";
print_r($_SESSION);
echo "</pre>";
?>

<p><a href="test2.php">Przejdź do strony test2.php</a></p>
</body>
</html>