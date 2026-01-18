<?php

include_once '../Baza.php';

include_once 'funkcje.php';

$bd = new Baza('localhost', 'db', '', 'klienci');
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Laboratorium 6 - PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<h1>Bazy Danych</h1>

<form method="POST" action="index.php">
    <div>
        <label>Nazwisko: <input type="text" name="nazwisko"></label><br>
        <label>Wiek: <input type="number" name="wiek"></label><br>
        <label>Państwo:
            <select name="panstwo">
                <option value="Polska">Polska</option>
                <option value="Niemcy">Niemcy</option>
                <option value="Wielka Brytania">Wielka Brytania</option>
                <option value="Czechy">Czechy</option>
            </select>
        </label><br>
        <label>Adres e-mail: <input type="email" name="email"></label>
    </div>

    <h3>Zamawiam tutorial z języka:</h3>
    <div>
        <?php
        $jezyki = ["Java", "PHP", "CPP"];
        foreach ($jezyki as $j): ?>
            <input type="checkbox" name="tutorial[]" value="<?= $j ?>"> <?= $j ?>
        <?php endforeach; ?>
    </div>

    <h3>Sposób zapłaty:</h3>
    <div>
        <input type="radio" name="platnosc" value="Visa" checked> Visa
        <input type="radio" name="platnosc" value="Master Card"> Master Card
        <input type="radio" name="platnosc" value="Przelew"> Przelew
    </div>

    <div style="margin-top: 10px;">
        <button type="submit" name="submit" value="Dodaj">Dodaj</button>
        <button type="submit" name="submit" value="Pokaż">Pokaż</button>
        <button type="reset">Wyczyść</button>
    </div>
</form>

<hr>

<?php
if (filter_input(INPUT_POST, "submit")) {
    $akcja = filter_input(INPUT_POST, "submit");
    switch ($akcja) {
        case "Dodaj":
            dodajdoBD($bd);
            break;
        case "Pokaż":
            echo "<h3>Zawartość bazy danych:</h3>";
            $pola = ["Id", "Nazwisko", "Wiek", "Panstwo", "Email", "Zamowienie", "Platnosc"];
            echo $bd->select("SELECT * FROM klienci", $pola);
            break;
    }
}
?>
</body>
</html>