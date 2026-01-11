<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Odebrane</title>
</head>
<body>
<h2>Dane odebrane z formularza</h2>

<div>
    Nazwisko: <?= htmlspecialchars($_POST['nazwisko']) ?>
</div>
<div>
    Wiek: <?= htmlspecialchars($_POST['wiek']) ?>
</div>
<div>
    Kraj: <?= htmlspecialchars($_POST['panstwo']) ?>
</div>
<div>
    Email: <?= htmlspecialchars($_POST['email']) ?>
</div>
<div>
    Wybrano tutoriale:
    <?php foreach ($_POST['tutorial'] as $tutorial) {
        echo htmlspecialchars($tutorial) . " ";
    } ?>
</div>
<div>
    Sposób płatności: <?= htmlspecialchars($_POST['platnosc']) ?>
</div>
<div>
    <a href="./formularz.php">Powrót do formularza</a>
</div>
</body>
</html>