<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Laboratorium 7</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>
<body>
<h1>Obsługa użytkowników z bazą danych</h1>
<div>
    <?php
    include_once './klasy/User.php';
    include_once './klasy/RegistrationForm.php';
    include_once './klasy/Baza.php';

    $db = new Baza('localhost', 'db', '', 'klienci');
    $rf = new RegistrationForm(); // wyświetla formularz

    if (filter_input(INPUT_POST, 'submit')) {
        $user = $rf->checkUser();

        if ($user === null) {
            echo "<p style='color:red'>Niepoprawne dane rejestracji.</p>";
        } else {
            echo "<p style='color:green'>Poprawne dane rejestracji. Zapisano do bazy.</p>";
            $user->saveDB($db);
        }
    }

    echo "<h3>Lista użytkowników w bazie:</h3>";
    User::getAllUsersFromDB($db);
    ?>
</div>
</body>
</html>