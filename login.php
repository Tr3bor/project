<html>
<?php 
    include 'header.php'; 
    $username = $password = "";
    $error_log = $login_error_log = "";
 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if(empty(trim($_POST["username"]))){
            $error_log = $error_log + "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        if(empty(trim($_POST["password"]))){
            $error_log = $error_log + "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        if(empty($error_log) && empty($error_log)){
            $sql = "SELECT id, username, password, isadmin FROM users WHERE username = ?";
            if($stmt = $db->prepare($sql)){
                $stmt->bind_param("s", $param_username);
                
                $param_username = $username;
                if($stmt->execute()){
                    $stmt->store_result();
                    
                    if($stmt->num_rows == 1){                  
                        $stmt->bind_result($id, $username, $hashed_password, $isadmin);
                        if($stmt->fetch()){
                            
                            if(password_verify($password, $hashed_password)){
                                session_start();
                                
                                $_SESSION["islogin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;                           
                                $_SESSION["isadmin"] = $isadmin;
                                $_SESSION['cart'] = [];
                                header("location: new-product");
                            } else{
                                $login_error_log = "Invalid username or password.";
                            }
                        }
                    } else {
                        $login_error_log = "Invalid username or password.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                $stmt->close();
            }
        }
        $db->close();
    }
?>

    <section class="login">
    <div class="login-container container">
        <div class="login-title bold">
            Hello!
        </div>
        <div class="login-content">
            Sign in to your account!
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="login-icont"><i class="fa-solid fa-user"></i><input placeholder="Username" class="login-input-1" type="text" name="username"></div>
            <div class="login-icont"><i class="fa-solid fa-lock"></i><input placeholder="Password" class="login-input-2" type="password" name="password"></div>
            <input type="submit" class="login-submit" value="SIGN IN">
            <div class="login-link">Don't have an account? <a href="register">Create</a></div>
            <?php //echo $_SESSION["isadmin"]; ?>
        </form>
    </div>

    </section>

</body>
</html>