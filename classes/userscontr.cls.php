<?php

class UsersContr extends Users
{
    public function loginUser(string $username, string $password)
    {
        $this->emptyCheck($username, $password);

        $user = $this->verifyAndGetUser($username, $password);
        $this->setCookies($user['username'], $user['user_id']);
        return $user;
    }

    public function registerUser(string $email, string $username, string $password, string $passwordRepeat)
    {
        $this->emptyCheck($username, $password, $email);
        if ($password !== $passwordRepeat) throw new Exception("Please repeat your password", 400);
        $this->mailCheck($email);

        // write check for user existance here, if needed

        $this->setUserStmt($email, $username, $password);
        $user = $this->getUserByName($username);
        $this->setCookies($user['username'], $user['user_id']);
        return $user;
    }

    public function updateUserPassword(string $username, string $oldPassword, string $password)
    {
        $user = $this->verifyAndGetUser($username, $oldPassword);
        $this->updateUserPasswordStmt($password, $username);
        return $user;
    }

    public function deleteUser(string $username, string $password)
    {
        $user = $this->verifyAndGetUser($username, $password);
        $this->deleteUserStmt($username);
        return $user;
    }

    private function verifyAndGetUser(string $username, string $password)
    {
        $user = $this->getUserByName($username);
        if (!$user) {
            throw new Exception("User not found", 404);
        }
        if (!password_verify($password, $user['password'])) {
            throw new Exception("User/Password combination not found", 403);
        }
        return $user;
    }

    private function emptyCheck(string ...$inputs)
    {
        foreach ($inputs as $key => $input) {
            if (empty($input)) throw new Exception("Please enter your " . $this->inputCodes($key), 400);
        }
    }

    private function mailCheck(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("Please enter valid email", 400);
    }

    private function inputCodes(int $key)
    {
        switch ($key) {
            case 0:
                return "username";
            case 1:
                return "password";
            case 2:
                return "email";
            default:
                return "";
        }
    }
}
