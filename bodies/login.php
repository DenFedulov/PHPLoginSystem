<form>
    <input type="text" id="username" placeholder="E-mail or username">
    <br>
    <input type="password" id="password" placeholder="Password">
    <br>
    <button type="button" name="submit" id="login-b" onclick='loadPHPOnClick(`inc/login.inc.php`, {
        username: $("#username").val(),
        password: $("#password").val()
    }, $(".log"), `POST`);'>Login</button>
    <div class="log"></div>
</form>