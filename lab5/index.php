<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klasy</title>
</head>
<body>
<h1>Klasy</h1>
<div>
    <?php
    include_once 'klasy/User.php';
    include_once 'klasy/RegistrationForm.php';

    $rf = new RegistrationForm(); // wyświetla formularz

    if (filter_input(INPUT_POST, 'submit')) {
        $user = $rf->checkUser();

        if ($user === null) {
            echo "<p>Niepoprawne dane rejestracji.</p>";
        } else {
            echo "<p>Poprawne dane rejestracji:</p>";
            $user->show();

            // zapis do pliku JSON
            $user->save("users.json");
        }
    }

    User::getAllUsers("users.json");
    ?>
</div>

</body>
</html>