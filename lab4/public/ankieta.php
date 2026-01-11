<?php
$tech = ["C", "CPP", "Java", "C#", "Html", "CSS", "XML", "PHP", "JavaScript"];
$root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') ?? $_SERVER['DOCUMENT_ROOT'];
$plik = $root . '/../data/ankieta.txt';

// Utworzenie pliku jeśli nie istenieje i dodanie technologii z wartościami 0
if (!file_exists($plik)) {
    $start = "";
    foreach ($tech as $t) {
        $start .= "$t:0\n";
    }
    file_put_contents($plik, $start);
}

/* --- Obsługa formularza --- */
if (isset($_POST['submit'])) {

    // odczyt aktualnych wyników
    $linie = file($plik, FILE_IGNORE_NEW_LINES);
    $wyniki = [];

    foreach ($linie as $linia) {
        list($nazwa, $ilosc) = explode(":", $linia);
        $wyniki[$nazwa] = (int)$ilosc;
    }

    // zwiększ liczniki dla zaznaczonych technologii
    if (!empty($_POST['tech'])) {
        foreach ($_POST['tech'] as $zaznaczona) {
            if (isset($wyniki[$zaznaczona])) {
                $wyniki[$zaznaczona]++;
            }
        }
    }

    // zapis do pliku
    $out = "";
    foreach ($wyniki as $nazwa => $ilosc) {
        $out .= "$nazwa:$ilosc\n";
    }
    file_put_contents($plik, $out);

    // pokaz wyniki
    echo "<h2>Wyniki ankiety</h2>";
    echo "<ul>";
    foreach ($wyniki as $nazwa => $ilosc) {
        echo "<li>$nazwa - $ilosc</li>";
    }
    echo "</ul>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ankieta</title>
</head>
<body>
<h2>Wybierz technologie, które znasz:</h2>

<form method="POST">
    <?php foreach ($tech as $t): ?>
        <div>
            <label>
                <input type="checkbox" name="tech[]" value="<?= $t ?>">
                <?= $t ?>
            </label>
        </div>
    <?php endforeach; ?>

    <br>
    <button type="submit" name="submit">Wyślij</button>
</form>
<div>
    <a href="./index.php">Powrót do strony głównej</a>
</div>
</body>
</html>