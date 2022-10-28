<?php
echo "<br>Your profile information is:<br>";
if (!session_id()) {
    session_start();
}
foreach (array_keys($_SESSION) as $key) {
    echo $key . ": " . $_SESSION[$key] . "<br>";
}

?>
<form>
    <table>
        <tbody>
            <tr>
                <td>
                    <button type="button" id="delete-user-b" onclick='
                        loadPHPOnClick(`inc/deleteuser.inc.php`, {
                    username: $("#username-d").val(),
                    password: $("#password-d").val()
                                }, $(".log"), `POST`);
                                $("#username-d").val("");
                                $("#password-d").val("");
                                '>Delete the user</button>
                </td>
                <td><input type="text" id="username-d" placeholder="Username or Email"></td>
                <td><input type="password" id="password-d" placeholder="Password"></td>
            <tr>

                <td>
                    <button type="button" id="update-pw-b" onclick='
                        loadPHPOnClick(`inc/updateuserpassword.inc.php`, {
                    username: $("#username-u").val(),
                    passwordO: $("#password-o").val(),
                    passwordN: $("#password-n").val()
                                }, $(".log"), `POST`);
                                $("#username-d").val("");
                                $("#password-d").val("");
                                '>Update password of the user</button>
                </td>
                <td><input type="text" id="username-u" placeholder="Username or Email"></td>
                <td><input type="password" id="password-o" placeholder="Old password"></td>
                <td><input type="password" id="password-n" placeholder="New password"></td>
            </tr>
        </tbody>
    </table>
</form>