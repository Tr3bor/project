<html>
<?php 
    include 'header.php'; 
    session_start();
    include 'dbConfig.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo 'yes';
        $error_log = '';
        echo $_POST["username"];
        if(empty(trim($_POST["username"]))){
            $error_log = "Username field is empty.";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
            $error_log = "Username can only contain letters, numbers, and underscores.";
        } else {
            echo 'asdf';
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE username = ?";

            if($stmt = $db->prepare($sql)){
                echo 'asdf2';
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_username);
                
                // Set parameters
                $param_username = trim($_POST["username"]);
                
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    echo 'asdf3';
                    // store result
                    $stmt->store_result();
                    
                    if($stmt->num_rows == 1){
                        $error_log = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                        echo 'usernamegood';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.1";
                }
    
                // Close statement
                $stmt->close();
            }
        }
        
        // Validate password
        if(empty(trim($_POST["password"]))){
            $error_log = "Please enter a password.";     
        } elseif(strlen(trim($_POST["password"])) < 6){
            $error_log = "Password must have atleast 6 characters.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Check input errors before inserting in database
        if(empty($error_log)){
            
            // Prepare an insert statement
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
             
            if($stmt = $db->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ss", $param_username, $param_password);
                
                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_BCRYPT); // Creates a password hash
                echo $param_username; echo $param_password;
                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // Redirect to login page
                    echo 'yes2';
                    header("location: login.php");
                } else{
                    echo "Oops! Something went wrong. Please try again later.2";
                    var_dump($stmt);
                }
    
                // Close statement
                $stmt->close();
            }
        } else {
            var_dump($error_log);
            echo 'fjidf';
        }
        
        // Close connection
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