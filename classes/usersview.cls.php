<?php

class UsersView extends UsersContr
{
    public function showUsersTable()
    {
        echo "<table border = 1 cellpadding = 5><thead><tr>";
        foreach ($this->getUsersColumns() as $row) {
            foreach ($row as $val) {
                echo "<th>" . $val . "</th>";
            }
        }
        echo "</tr></thead><tbody>";
        foreach ($this->getUsersArray() as $row) {
            echo "<tr>";
            foreach ($row as $val) {
                echo "<td>" . $val . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    public function tryDeleteUser(string $username, string $password)
    {
        try {
            $user = $this->deleteUser($username, $password);
            echo "User " . $user['username'] . " deleted successfully!";
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function tryRegisterUser(string $email, string $username, string $password, string $passwordRepeat)
    {
        try {
            $user = $this->registerUser($email, $username, $password, $passwordRepeat);
            echo $user['username'];
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function tryLoginUser(string $username, string $password)
    {
        try {
            $user = $this->loginUser($username, $password);
            echo $user['username'];
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function tryUpdateUserPassword(string $username, string $oldPassword, string $password)
    {
        try {
            $user = $this->updateUserPassword($username, $oldPassword, $password);
            echo "Password of user " . $user['username'] . " updated successfully!";
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }
}
