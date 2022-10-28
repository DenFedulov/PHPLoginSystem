<form>
    <input type="text" id="email" placeholder="E-mail">
    <br>
    <input type="text" id="username" placeholder="Username">
    <br>
    <input type="password" id="password" placeholder="Password">
    <br>
    <input type="password" id="passwordRepeat" placeholder="Repeat password">
    <br>
    <button type="button" name="submit" id="signup-b" onclick='loadPHPOnClick(`inc/register.inc.php`, {
                email: $("#email").val(),
                username: $("#username").val(),
                password: $("#password").val(),
                passwordRepeat: $("#passwordRepeat").val()
            }, $(".log"), `POST`);'>Sing-up</button>
    <div class="log"></div>
</form>