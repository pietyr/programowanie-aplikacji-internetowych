<?php
include 'funkcje.php';

$jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
$plik = $_SERVER['DOCUMENT_ROOT'] . '/../data/dane.txt';


if (isset($_POST['submit'])) {

    switch ($_POST['submit']) {

        case 'save':
            file_put_contents($plik, dodaj(), FILE_APPEND);
            break;

        case 'show':
            pokaz($plik);
            break;

        case 'php':
            pokaz_zamowienie('PHP', $plik);
            break;

        case 'cpp':
            pokaz_zamowienie('CPP', $plik);
            break;

        case 'java':
            pokaz_zamowienie('Java', $plik);
            break;
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zamówienie</title>
</head>
<body>
<h2>Formularz zamówienia</h2>
<form method="POST" action="./pliki.php">
    <div>
        <div>
            <label>
                <span>Nazwisko:</span>
                <input type="text" name="nazwisko">
            </label>
        </div>
        <div>
            <label>
                <span>Wiek:</span>
                <input type="number" name="wiek" min="1" max="130">
            </label>
        </div>
        <div>
            <label>
                <span>Państwo:</span>
                <select name="panstwo">
                    <option value="polska">Polska</option>
                    <option value="niemcy">Niemcy</option>
                    <option value="usa">USA</option>
                </select>
            </label>
        </div>
        <div>
            <label>
                <span>Adres e-mail:</span>
                <input type="email" name="email">
            </label>
        </div>
    </div>
    <h3>Zamawiam tutorial z języka:</h3>
    <div>
        <?php foreach ($jezyki as $jezyk): ?>
            <label>
                <input type="checkbox" name="tutorial[]" value="<?= $jezyk ?>">
                <span><?= $jezyk ?></span>
            </label>
        <?php endforeach; ?>
    </div>
    <h3>Sposób zapłaty:</h3>
    <div>
        <label>
            <input type="radio" name="platnosc" value="eurocard">
            <span>eurocard</span>
        </label>
        <label>
            <input type="radio" name="platnosc" value="visa">
            <span>visa</span>
        </label>
        <label>
            <input type="radio" name="platnosc" value="przelew bankowy">
            <span>przelew bankowy</span>
        </label>
    </div>
    <div>
        <button type="submit" name="submit" value="clear">Wyczyść</button>
        <button type="submit" name="submit" value="save">Zapisz</button>
        <button type="submit" name="submit" value="show">Pokaż</button>
        <button type="submit" name="submit" value="php">PHP</button>
        <button type="submit" name="submit" value="cpp">CPP</button>
        <button type="submit" name="submit" value="java">Java</button>
    </div>
</form>
<div>
    <pre>
    </pre>
</div>
</body>
</html>