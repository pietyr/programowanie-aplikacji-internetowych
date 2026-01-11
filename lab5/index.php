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
    include 'klasy/User.php';

    $user1 = new User('userOne', 'passwd1234', 'Jan Adamczewski', 'jan@adamczycha.pl');
    $user2 = new User('userTwo', 'haslo', 'Jan Kowalski', 'jan@kowalski.pl');

    $user1->show();
    $user2->show();

    $user2->setUserName('admin');
    $user2->setStatus(User::STATUS_ADMIN);
    $user2->show();

    ?>
</div>
</body>
</html>