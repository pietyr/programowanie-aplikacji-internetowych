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
<form method="POST">
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
        <label>
            <input type="checkbox" name="tutorial[]" value="PHP">
            <span>PHP</span>
        </label>
        <label>
            <input type="checkbox" name="tutorial[]" value="C/C++">
            <span>C/C++</span>
        </label>
        <label>
            <input type="checkbox" name="tutorial[]" value="Java">
            <span>Java</span>
        </label>
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
        <button type="submit" formaction="./odbierz.php">Wyślij do odbierz.php</button>
        <button type="submit" formaction="./odbierz2.php">Wyślij do odbierz2.php</button>
        <button type="reset">Anuluj</button>
    </div>
</form>
</body>
</html>