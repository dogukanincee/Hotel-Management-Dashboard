<!DOCTYPE html>
<html lang="en">

<head>
    <title> Login Form </title>
    <link rel="stylesheet" type="text/css" href="loginstylee.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

<div class="form">

    <img src="avatar.png" class="avatar" alt="hotelImage">
    <form id="loginForm" method="post" action="loginCheck.php">
        <h1>Login</h1>
        <div class="input-group">
            <label>Username:</label>
            <input name="username" required type="text" placeholder="Enter username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" id="password" required placeholder="Enter password">
            <input type="checkbox" onclick="showPassword()">Show Password</input>
        </div>
        <div class="input-group">
            <button class="btn" id="loginButton" name="login" type="submit">Login</button>
        </div>
        <p>
            Not a member yet? <a href="register.php">Sign up</a>
        </p>
    </form>
</div>
<script>

    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>

</html>