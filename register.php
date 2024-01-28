<html>
<?php include 'header.php'; ?>

    <section class="login">
    <div class="login-container container">
        <div class="login-title bold">
            Hello!
        </div>
        <div class="login-content">
            Register for an account!
        </div>
        <form name="registerForm" method="post" action="#" onsubmit="return validateForm()">
            <div class="login-icont"><i class="fa-regular fa-envelope"></i><input placeholder="E-mail" class="login-input-1" type="email" name="email"></div>
            <div class="login-icont"><i class="fa-solid fa-user"></i><input placeholder="Username" class="login-input-3" type="email" name="username"></div>
            <div class="login-icont"><i class="fa-solid fa-lock"></i><input placeholder="Password" class="login-input-2" type="password" name="password"></div>
            <input type="submit" class="login-submit" value="REGISTER">
            <div class="login-link">Already have an account? <a href="login.php">Login</a></div>
        </form>
    </div>

    </section>

</body>
</html>