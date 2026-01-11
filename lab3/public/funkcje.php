<?php
function dodaj()
{
    $dane = "";
    foreach ($_POST as $key => $value) {
        if ($key !== "submit") {
            if (is_string($value)) {
                $dane .= htmlspecialchars($value) . " ";
            }
            if (is_array($value)) {
                foreach ($value as $v) {
                    $dane .= htmlspecialchars($v) . ",";
                }
                $dane .= " ";
            }
        }
    }
    $dane .= PHP_EOL;
    return $dane;
}

function pokaz($plik)
{
    if (file_exists($plik)) {
        echo "<h3>Wszystkie zamówienia:</h3>";
        echo "<pre>";
        echo htmlspecialchars(file_get_contents($plik));
        echo "</pre>";
    }
}

function pokaz_zamowienie($jezyk, $plik)
{
    if (file_exists($plik)) {
        $linie = file($plik, FILE_IGNORE_NEW_LINES);

        echo "<h3>Zamówienia na tutorial: $jezyk</h3>";
        echo "<pre>";

        foreach ($linie as $linia) {
            if (stripos($linia, $jezyk) !== false) {
                echo htmlspecialchars($linia) . PHP_EOL;
            }
        }

        echo "</pre>";
    }
}