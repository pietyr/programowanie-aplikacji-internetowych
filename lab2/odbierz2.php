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
<h3>GET:</h3>
<div>
    <?php foreach ($_GET as $key => $value) {
        if (is_string($value)) {
            echo htmlspecialchars($key) . ": " . htmlspecialchars($value) . "<br>";
        }
        if (is_array($value)) {
            echo htmlspecialchars($key) . ": ";
            foreach ($value as $v) {
                echo htmlspecialchars($v) . "<br>";
            }
        }
    } ?>
</div>
<h3>POST:</h3>
<div>
    <?php foreach ($_POST as $key => $value) {
        if (is_string($value)) {
            echo htmlspecialchars($key) . ": " . htmlspecialchars($value) . "<br>";
        }
        if (is_array($value)) {
            echo htmlspecialchars($key) . ": ";
            foreach ($value as $v) {
                echo htmlspecialchars($v) . "<br>";
            }
        }
    } ?>
</div>

<h3>REQUEST:</h3>
<div>
    <?php foreach ($_REQUEST as $key => $value) {
        if (is_string($value)) {
            echo htmlspecialchars($key) . ": " . htmlspecialchars($value) . "<br>";
        }
        if (is_array($value)) {
            echo htmlspecialchars($key) . ": ";
            foreach ($value as $v) {
                echo htmlspecialchars($v) . "<br>";
            }
        }
    } ?>
</div>

<div>
    <a href="./formularz.php">Powrót do formularza</a>
</div>
</body>
</html>