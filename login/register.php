<?php
require_once '../admin/process/query.php';
date_default_timezone_set("Asia/Ho_Chi_Minh");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                    <h1>Register</h1>
                </div>
                <form method="post" class="grid__row">
                    <div class="input-f-name input">
                        <input type="text" name="f_name" placeholder="First name" class="f-name">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div class="input-l-name input">
                        <input type="text" name="l_name" placeholder="Last name" class="l-name">
                        <i class="fa-solid fa-user"></i>
                    </div>
    
                    <div class="input-phone input">
                        <input type="text" name="phone" placeholder="Phone" class="phone">
                        <i class="fa-solid fa-phone"></i>
                    </div>    
    
                    <div class="input-address input">
                        <input type="text" name="address" placeholder="Address" class="address">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>    

                    <div class="input-email input">
                        <input type="text" name="email" placeholder="Email" class="email">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div class="input-account input">
                        <input type="text" name="account" placeholder="Username" class="account">
                        <i class="fa-solid fa-circle-user"></i>
                    </div>

                    <div class="input_password input">
                        <input type="password" name="password" placeholder="Password" class="password">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    
                    <button class="button button--black" name="submit">Register</button>
                    <a href="../home.html" class="button button--main">Home page</a>
                    <div class="register-link">
                        <span>Already have an account?</span>
                        <a href="./login.html">Login</a>
                    </div>
                </form>
                <?php
                if(isset($_POST['submit'])) {
                    $account = new Account();
                    $customer = new Customer();
                    $account_id = 'acc' . count($account->getData())+1;
                    $customer_id = 'cus' . count($customer->getData())+1;
                    $dataAccount = [
                        'id' => $account_id,
                        'account' => $_POST['account'],
                        'password' => $_POST['password'],
                        'role' => 4
                    ];
                    $account->createData($dataAccount);

                    $dataCustomer = [
                        'id' => $customer_id,
                        'f_name' => $_POST['f_name'],
                        'l_name' => $_POST['l_name'],
                        'phone' => $_POST['phone'],
                        'email' => $_POST['email'],
                        'address' => $_POST['address'],
                        'a_id' => $account_id
                    ];
                    $customer->createData($dataCustomer);
                    echo '<script>alert("Success!")</script>';
                    header('location:../home.php');
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
                <a href="../home.html" class="logo">LOGO</a>
                <ul class="nav grid__row">
                    <a href="home.html">
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
        <script src="../js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>text = 'Registration success!'</script>
</body>
</html>