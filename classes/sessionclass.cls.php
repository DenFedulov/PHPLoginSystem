<?php

class SessionClass
{
    private function getCookieOptions()
    {
        return [
            "expires" => $this->getLifetime(),
            "path" => "/",
            "domain" => "",
            "secure" => true,
            "httponly" => true,
            "samesite" => "Strict"
        ];
    }

    private function getLifetime()
    {
        return time() + 60 * 60 * 24 * 30;
    }

    public function initSession()
    {
        if (!isset($_COOKIE['username']) || !isset($_COOKIE['uid'])) {
            $_SESSION['username'] = 'Guest';
        } else {
            $_SESSION['username'] = $_COOKIE['username'];
            $_SESSION['uid'] = $_COOKIE['uid'];
        }
    }

    public function setCookies($login, $uid)
    {
        setcookie("username", $login, $this->getCookieOptions());
        setcookie("uid", $uid, $this->getCookieOptions());
        $this->initSession();
    }
}
