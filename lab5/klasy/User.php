<?php

class User{

    const STATUS_USER = 0;
    const STATUS_ADMIN = 1;
    private string $userName;
    private string $passwd;
    private string $fullName;
    private string $email;
    private DateTime $date;
private int $status;

public function __construct(string $userName, string $passwd, string $fullName, string $email){
    $this->userName = $userName;
    $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
    $this->fullName = $fullName;
    $this->email = $email;
    $this->date = DateTime::createFromTimestamp(time());
    $this->status = self::STATUS_USER;
}

public function show(): void{
    echo '<div>';
    echo "UserName: {$this->userName}<br>";
    echo "Passwd: {$this->passwd}<br>";
    echo "FullName: {$this->fullName}<br>";
    echo "Email: {$this->email}<br>";
    echo "Date: {$this->date->format('Y-m-d')}<br>";
    echo "Status: {$this->status}<br>";
    echo '</div>';
}

public function setUserName(string $userName): void{
    $this->userName = $userName;
}

public function getUserName(): string{
    return $this->userName;
}

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getPasswd(): string
    {
        return $this->passwd;
    }

    public function setPasswd(string $passwd): void
    {
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
    }



}