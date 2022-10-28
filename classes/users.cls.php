<?php

class Users extends Dbh
{
    protected function getUsersArray()
    {
        $sql = "SELECT * FROM `users`;";
        return $this->connect()->query($sql)->fetchAll();
    }

    protected function getUsersColumns()
    {
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'users'  AND TABLE_SCHEMA = '" . Dbh::getDbName() . "';";
        return $this->connect()->query($sql)->fetchAll();
    }

    protected function getUserByName(string $username)
    {
        $sql = "SELECT * FROM `users` WHERE `email` = ? OR `username` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $username]);
        return $stmt->fetch();
    }

    protected function setUserStmt(string $email, string $username, string $password)
    {
        $sql = "INSERT INTO `users` (`email`, `username`, `password`) VALUES (?,?,?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $username, password_hash($password, PASSWORD_DEFAULT)]);
    }

    protected function updateUserPasswordStmt(string $password, string $username)
    {
        $sql = "UPDATE `users` SET `password`=? WHERE `email`=? OR `username`=?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([password_hash($password, PASSWORD_DEFAULT), $username, $username]);
    }

    protected function deleteUserStmt(string $username)
    {
        $sql = "DELETE FROM `users` WHERE `email` = ? OR `username` = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $username]);
    }

    private function hashAllPasswords()
    {
        foreach ($this->getUsersArray() as $user) {
            $this->updateUserPasswordStmt($user['password'], $user['username']);
        }
    }
}
