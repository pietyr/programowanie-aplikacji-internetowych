<?php
class RegistrationForm
{
    protected ?User $user = null;

    public function __construct()
    {
        ?>
        <h3>Formularz rejestracji</h3>
        <form action="index.php" method="post">
            Nazwa użytkownika:<br/>
            <input type="text" name="userName"><br/>

            Imię i nazwisko:<br/>
            <input type="text" name="fullName"><br/>

            Hasło:<br/>
            <input type="password" name="passwd"><br/>

            Email:<br/>
            <input type="email" name="email"><br/><br/>

            <button type="submit" name="submit" value="register">Rejestruj</button>
            <button type="reset">Anuluj</button>
        </form>
        <?php
    }

    public function checkUser(): ?User
    {
        $args = [
            'userName' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/'
                ]
            ],
            'fullName' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => '/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+(\s[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+)+$/'
                ]
            ],
            'passwd' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => '/^.{6,}$/'
                ]
            ],
            'email' => FILTER_VALIDATE_EMAIL
        ];

        // filtrowanie danych
        $dane = filter_input_array(INPUT_POST, $args);

        // sprawdzanie błędów (jak w lab4)
        $errors = "";

        foreach ($dane as $key => $val) {
            if ($val === false || $val === null) {
                $errors .= $key . " ";
            }
        }

        if ($errors === "") {
            $this->user = new User(
                $dane['userName'],
                $dane['passwd'],
                $dane['fullName'],
                $dane['email']
            );
        } else {
            $this->user = null;
        }

        return $this->user;
    }
}
