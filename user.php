<?php 
require_once './admin/process/query.php'; 
session_start();
if(!isset($_SESSION['account_role'])) {
    header('location: ./login/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User setting</title>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container container__wrap">
    <!-- Header -->
        <header class="header grid__row grid__full-width">
            <a href="home.html" class="logo">
                <span class="">T2A</span>
            </a>
      
            <ul class="nav grid__row">

                <li class="nav-item">
                    <a href="home.html" class="nav-link" aria-current="page">Home</a>
                </li>

                <li class="nav-item">
                    <a href="tours.php" class="nav-link">Tours</a>
                </li>

                <li class="nav-item">
                    <a href="community.html" class="nav-link">Community</a>
                </li>

                <li class="nav-item">
                    <a href="about.html" class="nav-link">About Us</a>
                </li>

                <li class="nav-item">
                    <a href="faqs.html" class="nav-link">FAQs</a>
                </li>
                <!-- 
                <li class="nav-item">
                    <a href="./login/login.html" class="button button--main">Login</a>
                </li>
                
                <li class="nav-item">
                    <a href="./login/register.html" class="button button--return">Register</a>
                </li> -->

                <li class="nav-item">
                    <a href="./user.html" class="nav-link active">
                        <i class="fa-solid fa-circle-user"></i>
                        <span><?php echo $_SESSION['account_username'] ?></span>
                    </a>
                </li>

                <li class="nav-item logout-item grid__row">
                    <a href="./admin/process/logout.php" class="">
                        Logout
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </li>

            </ul>   
        </header>
    </div>
        <!-- End of Header -->
        <?php
                $account = new Account();
                $data = [
                    'id' => $_SESSION['account_ID']
                ];
                $value = $account->getEachDataLeftJoin($data)['0'];
                $role = $_SESSION['account_role']; 
                ?>
        <div class="user-setting">
            <div class="container__wrap">
                <div class="user-header">
                    <h1>Account setting</h1>
                    <p class="greeting">Hello <?php echo $_SESSION['account_username'] ?></p>
                    <p class="user-email">Email: 
                        <span><?php if($role == 3) {
                                        echo $value['supplier_email'];
                                    } else if($role == 4) {
                                        echo $value['customer_email'];
                                    } 
                                ?>
                        </span></p>
                </div>
                
                <form action="" class="user-data grid__row" id="user-setting-form">
                    <?php if($role!=3) : ?>
                    <div class="input input-f-name">
                        <label for="first">Your first name</label>
                        <input type="text" name="f_name" class="f-name" id="first" value="<?php echo $value['customer_first_name']?>">

                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div class="input input-l-name">
                        <label for="last">Your last name</label>
                        <input type="text" name="l_name" class="l-name" id="last" value="<?php echo $value['customer_last_name']?>">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <?php endif; ?>

                    <?php if($role == 3) :?>
                    <div class="input input-l-name">
                        <label for="name">Your name</label>
                        <input type="text" name="name" class="l-name" id="name" value="<?php echo $value['supplier_name']?>">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <?php endif ?>
                    <div class="input input-email">
                        <label for="email">Your email address</label>
                        <input type="text" name="email" class="email" id="email" 
                        value="<?php
                                if($role == 4 ) {
                                    echo $value['customer_email'];
                                } else if($role == 3) {
                                    echo $value['supplier_email'];
                                }
                                ?>">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div class="input input-phone">
                        <label for="phone">Your phone number</label>
                        <input type="text" name="phone" class="phone" id="phone" 
                        value="<?php
                                if($role == 4 ) {
                                    echo $value['customer_phone'];
                                } else if($role == 3) {
                                    echo $value['supplier_phone'];
                                }
                                ?>">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    
                    <div class="input input-address">
                        <label for="address">Your address</label>
                        <input type="text" name="address" class="address" id="address" 
                        value="<?php
                                if($role == 4 ) {
                                    echo $value['customer_address'];
                                } else if($role == 3) {
                                    echo $value['supplier_address'];
                                }
                                ?>">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <?php if($_SESSION['account_role'] == 4) : ?>
                    <div class="input input-birthday">
                        <label for="day-of-birth">Your birthday</label>
                        <input type="date" name="birthday" class="birthday" id="day-of-birth" value="<?php echo $value['customer_birthday']?>">
                    </div>
                    <div class="input input-gender grid__row">
                        <label>Your gender</label>
                        <input type="radio" <?php if($value['customer_gender'] == 'Male') {echo 'checked';}?> name="gender" class="gender" value="Male">
                        <span>Male</span>
                        <input type="radio" <?php if($value['customer_gender'] == 'Female') {echo 'checked';}?>  name="gender" class="gender" value="Female">
                        <span>Female</span>
                    </div>
                    <?php endif ?>

                    <div class="input input-password">
                        <label for="password">Your password</label>
                        <input type="text" name="password" class="password" id="password" value="<?php echo $value['account_password']?>">
                        <i class="fa-solid fa-key"></i>
                    </div>
                    
                    <div class="user-form-btn grid__row">
                        <button class="button button--black">Save change</button>
                        <a href="#" class="button button--red" id="delete-account">Delete account</a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="footer">
            <div class="footer__nav grid__row grid__full-width">
                <p>
                    <i class="fa-regular fa-copyright"></i>
                    <span>Travel Agency</span>
                </p>
                <a href="home.html" class="logo">LOGO</a>
                <ul class="nav grid__row">
                    <a href="home.html">
                        <li>Home</li>
                    </a>
                    <a href="tours.php">
                        <li>Tours</li>
                    </a>
                    <a href="community.html">
                        <li>Community</li>
                    </a>
                    <a href="about.html">
                        <li>About us</li>
                    </a>
                    <a href="faqs.html">
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
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       deleteAccountUser();
       validateUserInfo();
    //    submitUserChange();
    </script>
</body>
</html>