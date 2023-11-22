<?php 
require_once '../admin/process/query.php'; 
session_start();
if(isset($_SESSION['account_role'])) {
    header('location: ../home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
        <!-- Body -->
        <div class="login body grid__row">
            <div class="login-form grid__row">
                <div class="website-logo">
                    <h1>Login</h1>
                </div>
                <form method="post" class="grid__row">
                    <div class="input-account input">
                        <input type="text" name="account" placeholder="Email" class="account">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    
                    <div class="input_password input">
                        <input type="password" name="password" placeholder="Password" class="password">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    
                    <div class="input__under grid__row">
                        <div class="remember-me grid__row">
                            <input type="checkbox" name="rememberMe" id="remember_me">
                            <span>Remember me</span>
                        </div>

                        <div class="forgot-password">
                            <a href="./forgot.html" target="_blank">Forgot password?</a>
                        </div>

                    </div>

                    <button class="button button--black" name="submit">Login</button>
                    <a href="../home.php" class="button button--main">Home page</a>
                    <div class="register-link">
                        <span>Don't have account?</span>
                        <a href="./register.php">Register</a>
                    </div>
                </form>
                <?php
                if(isset($_POST['submit'])) {
                    // session_start(); 
                    $data = [
                        'account_username' => $_POST['account'],
                        'account_password' => $_POST['password'],
                    ];

                    $log = new Login();
                    $login = $log->login($data)['0'];
                    // var_dump($login);
                    
                    if($login !== null && is_array($login) && count($login) > 0) {
                        $_SESSION['account_username'] = $login['account_username'];
                        $_SESSION['account_password'] = $login['account_password'];
                        $_SESSION['account_role'] = $login['account_role'];
                        $_SESSION['account_ID'] = $login['account_ID'];
                        echo '<script>loginSuccess("Login successful!", "../home.php")</script>;';
                        // echo 'window.location.href="../home.php";</script>';
                        // header('location:../home.php');
                        // exit;
                    } else {
                        echo '<script>swalError("Login failed! Username or password incorrect.", window.location.href);</script>';
                        // echo 'window.location.href="./login.php";</script>';
                        exit();
                    }
                }
                ?>
            </div>
        </div>
        <!-- End of Body -->
        
        <!-- Footer -->
        <footer class="footer">
            <div class="footer__nav grid__row grid__full-width">
                <p>
                    <i class="fa-regular fa-copyright"></i>
                    <span>Travel Agency</span>
                </p>
                <a href="../home.php" class="logo">LOGO</a>
                <ul class="nav grid__row">
                    <a href="home.php">
                        <li>Home</li>
                    </a>
                    <a href="../tours.php">
                        <li>Tours</li>
                    </a>
                    <a href="../community.html">
                        <li>Community</li>
                    </a>
                    <a href="../about.html">
                        <li>About us</li>
                    </a>
                    <a href="../faqs.html">
                        <li>FAQs</li>
                    </a>
                </ul>
            </div>

            <div class="footer__icon">
                <a href="facebook.com">
                    <i class="fa-brands fa-facebook"></i>
                </a>

                <a href="instagram.com">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="mailto:">
                    <i class="fa-regular fa-envelope"></i>
                </a>

                <a href="tel:">
                    <i class="fa-solid fa-square-phone"></i>
                </a>
            </div>

        </footer>
        <!-- End of Footer -->
</body>
</html>