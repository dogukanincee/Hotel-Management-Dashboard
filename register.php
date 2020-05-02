<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> Registration Form </title>
    <link rel="stylesheet" type="text/css" href="registerstylee.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

<div class="form">
    <img src="avatar.png" class="avatar" alt="avatar">
    <form id="registrationForm" method="post" action="registerCheck.php">
        <h1>Register</h1>
        <div class="input-group">
            <label>First Name:</label>
            <input type="text" name="firstname" required placeholder="Enter first name">
        </div>
        <div class="input-group">
            <label>Last Name:</label>
            <input type="text" name="lastname" required placeholder="Enter last name">
        </div>
        <div class="input-group">
            <label>Username:</label>
            <input type="text" name="username" required placeholder="Enter username">
        </div>
        <div class="input-group">
            <label>Email:</label>
            <input type="email" name="email" required placeholder="Enter email">
        </div>
        <div class="input-group">
            <label>Password:</label>
            <input type="password" name="password" id="password" required placeholder="Enter password">
            <input type="checkbox" onclick="showPassword()">Show Password</input>
        </div>
        <div class="input-group">
            <label>Gender:</label>
            <input type="radio" name="gender" value="male" required>Male
            <input type="radio" name="gender" value="female" required>Female
        </div>
        <div class="input-group">
            <button id="signUpButton" type="submit" class="btn" name="signup">Sign Up</button>
        </div>
        <p>
            Already a member? <a href="login.php">Log in</a>
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
</body

</html>