<?php

class BazaPDO
{
    private PDO $dbh; //uchwyt do BD

    public function __construct(string $serwer = 'localhost', string $user = 'sql', string $pass = '', string $baza = 'klienci')
    {
        try {
            $dsn = "mysql:host=$serwer;dbname=$baza;charset=utf8";
            $this->dbh = new PDO($dsn, $user, $pass, [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function __destruct()
    {
        $this->dbh = null;
    }

    public function select($sql, $pola)
    {
        $tresc = "<table><thead><tr>";
        foreach ($pola as $pole) {
            $tresc .= "<th>$pole</th>";
        }
        $tresc .= "</tr></thead><tbody>";

        try {
            $stmt = $this->dbh->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $tresc .= "<tr>";
                foreach ($pola as $pole) {
                    $tresc .= "<td>" . $row[$pole] . "</td>";
                }
                $tresc .= "</tr>";
            }
        } catch (PDOException $e) {
            return "Błąd zapytania: " . $e->getMessage();
        }

        $tresc .= "</tbody></table>";
        return $tresc;
    }

    public function insert($sql)
    {
        try {
            if ($this->dbh->exec($sql)) {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
        return false;
    }
}