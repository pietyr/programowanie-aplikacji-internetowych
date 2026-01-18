<?php

function dodaj($plik)
{
    echo "<h3>Dodawanie do pliku:</h3>";
    walidacja($plik);
}

/**
 * Funkcja walidująca dane formularza
 */
function walidacja($plik)
{
    $args = [
        'nazwisko' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => [
                'regexp' => '/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż-]{1,25}$/'
            ]
        ],
        'wiek' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1, 'max_range' => 130]
        ],
        'panstwo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_VALIDATE_EMAIL,
        'platnosc' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'tutorial' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ]
    ];

    // filtrowanie danych
    $dane = filter_input_array(INPUT_POST, $args);

    // pokaz wynik walidacji (jak w poleceniu)
    echo "<pre>";
    var_dump($dane);
    echo "</pre>";

    // sprawdzanie błędów
    $errors = "";

    foreach ($dane as $key => $val) {
        if ($val === false || $val === null) {
            $errors .= $key . " ";
        }
    }

    if ($errors === "") {
        dopliku($plik, $dane);
    } else {
        echo "<p><strong>Nie poprawne dane:</strong> $errors</p>";
    }
}

/**
 * Zapis danych do pliku
 */
function dopliku($nazwaPliku, $tablicaDanych)
{
    $linia = "";

    foreach ($tablicaDanych as $value) {
        if (is_array($value)) {
            $linia .= implode(",", $value) . " ";
        } else {
            $linia .= $value . " ";
        }
    }

    $linia .= PHP_EOL;

    file_put_contents($nazwaPliku, $linia, FILE_APPEND);

    echo "<p><strong>Zapisano:</strong><br>$linia</p>";
}

/**
 * Wyświetlenie wszystkich danych
 */
function pokaz($plik)
{
    if (file_exists($plik)) {
        echo "<h3>Wszystkie zamówienia:</h3>";
        echo "<pre>";
        echo htmlspecialchars(file_get_contents($plik));
        echo "</pre>";
    }
}

/**
 * Filtrowanie po języku
 */
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

/**
 * Statystyki zamówień
 */
function statystyki($plik)
{
    if (!file_exists($plik)) {
        echo "<p>Brak danych do statystyk.</p>";
        return;
    }

    $linie = file($plik, FILE_IGNORE_NEW_LINES);

    $wszystkie = 0;
    $ponizej18 = 0;
    $powyzej49 = 0;

    foreach ($linie as $linia) {
        if (trim($linia) === "") continue;

        $wszystkie++;

        $dane = explode(" ", $linia);
        $wiek = (int)$dane[1]; // wiek jest drugim polem

        if ($wiek < 18) {
            $ponizej18++;
        }

        if ($wiek >= 50) {
            $powyzej49++;
        }
    }

    echo "<h3>Statystyki zamówień:</h3>";
    echo "<p>Liczba wszystkich zamówień: $wszystkie</p>";
    echo "<p>Liczba zamówień od osób w wieku &lt; 18 lat: $ponizej18</p>";
    echo "<p>Liczba zamówień od osób w wieku ≥ 50 lat: $powyzej49</p>";
}

function dodajdoBD($bd)
{
    $args = [
        'nazwisko' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż-]{1,25}$/']
        ],
        'wiek' => [
            'filter' => FILTER_VALIDATE_INT,
            'options' => ['min_range' => 1, 'max_range' => 130]
        ],
        'panstwo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_VALIDATE_EMAIL,
        'platnosc' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'tutorial' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ]
    ];

    $dane = filter_input_array(INPUT_POST, $args);

    $errors = "";
    foreach ($dane as $key => $val) {
        if ($val === false || $val === null) {
            $errors .= $key . " ";
        }
    }

    if ($errors === "") {
        // Przygotowanie danych do zapytania (obsługa zestawu SET dla tutoriali)
        $nazwisko = $dane['nazwisko'];
        $wiek = $dane['wiek'];
        $panstwo = $dane['panstwo'];
        $email = $dane['email'];
        $zamowienie = implode(",", $dane['tutorial']);
        $platnosc = $dane['platnosc'];

        $sql = "INSERT INTO klienci (Nazwisko, Wiek, Panstwo, Email, Zamowienie, Platnosc) 
                VALUES ('$nazwisko', $wiek, '$panstwo', '$email', '$zamowienie', '$platnosc')";

        if ($bd->insert($sql)) {
            echo "<p>Dodano rekord do bazy danych.</p>";
        } else {
            echo "<p>Błąd podczas dodawania do bazy.</p>";
        }
    } else {
        echo "<p>Błędne dane: $errors</p>";
    }
}
