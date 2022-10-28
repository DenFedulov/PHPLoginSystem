<?php
class Dbh extends SessionClass
{
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "login_system";

    protected function connect()
    {
        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname;
        $pdo = new PDO($dsn, self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function getDbName()
    {
        return self::$dbname;
    }
}
