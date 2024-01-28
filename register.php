<html>
<?php 
    include 'header.php'; 
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $error_log = '';
        if(empty(trim($_POST["username"]))){
            $error_log = "Username field is empty.";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
            $error_log = "Username can only contain letters, numbers, and underscores.";
        } else {
            $sql = "SELECT id FROM users WHERE username = ?";
            if($stmt = $db->prepare($sql)){
                $stmt->bind_param("s", $param_username);  
                $param_username = trim($_POST["username"]);

                if($stmt->execute()){
                    $stmt->store_result();
                    
                    if($stmt->num_rows == 1){
                        $error_log = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.1";
                }
                $stmt->close();
            }
        }
        
        if(empty(trim($_POST["password"]))){
            $error_log = "Please enter a password.";     
        } elseif(strlen(trim($_POST["password"])) < 6){
            $error_log = "Password must have atleast 6 characters.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        if(empty($error_log)){
            
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
             
            if($stmt = $db->prepare($sql)){
 
                $stmt->bind_param("ss", $param_username, $param_password);
                
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_BCRYPT); 
                echo $param_username; echo $param_password;

                if($stmt->execute()){
                    header("location: login.php");
                } else{
                    echo "Oops! Something went wrong. Please try again later.2";
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
            Register for an account!
        </div>
        <form name="registerForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
            <div class="login-icont"><i class="fa-regular fa-envelope"></i><input placeholder="E-mail" class="login-input-1" type="email" name="email"></div>
            <div class="login-icont"><i class="fa-solid fa-user"></i><input placeholder="Username" class="login-input-3" type="text" name="username"></div>
            <div class="login-icont"><i class="fa-solid fa-lock"></i><input placeholder="Password" class="login-input-2" type="password" name="password"></div>
            <input type="submit" class="login-submit" value="REGISTER">
            <div class="login-link">Already have an account? <a href="login.php">Login</a></div>
            <?php echo $error_log; ?>
        </form>
    </div>

    </section>

</body>
</html>