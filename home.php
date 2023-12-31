<?php
require_once './admin/process/query.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                    <a href="home.html" class="nav-link active" aria-current="page">Home</a>
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
                <?php 
                    if(isset($_SESSION['account_role'])) {
                ?>
                    <li class="nav-item">
                        <a href="<?php
                        if($_SESSION['account_role'] > 3) {
                            echo './user.php';
                        } else {
                            echo './admin/tours.php';
                        }
                        ?>" class="nav-link">
                            <i class="fa-solid fa-circle-user"></i>
                        <span><?php echo $_SESSION['account_username'] ?></span>
                    </a>
                </li>
                
                <li class="nav-item logout-item grid__row">
                    <a href="./admin/process/logout.php" class="log-out">
                        Logout
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </li>
                <?php
                } else { 
                ?>
                <li class="nav-item">
                    <a href="./login/login.php" class="button button--main">Login</a>
                </li>
                
                <li class="nav-item">
                    <a href="./login/register.php" class="button button--return">Register</a>
                </li>
                <?php } ?>
            </ul>   
        </header>
        <!-- End of Header -->
        
        <!-- Body -->
        <div class="booking">
            <div class="text-inside">
                <div class="slogan grid__row">Travel the world, see the sights and live the life</div>
                <div class="description">You deserve the world, so let us plan it for you.</div>
                <div>
                    <a href="" class="button button--black">
                        Start your travel
                    </a>
                </div>
            </div>
            
            <div class="cover-layer">
                <form action="" class="form-fp grid__row">

                    <div class="form-fp__input booking__location">
                        <p>Location</p>
                        <input type="text" placeholder="Enter your destination">
                    </div>
                    <div class="form-fp__input booking__date">
                        <p>Date</p>
                        <input type="date">
                    </div>
                    <div class="form-fp__input booking__number">
                        <p>Number travelers</p>
                        <input type="text" placeholder="How many people?">
                    </div>
                    <div class="form-fp__input booking__button">
                        <button class="button button--black">Explore now</button>
                    </div>

                </form>
                <div class="tour-layer">
                    <div class="tour-layer__content">
                        <div class="tour-layer__title">
                            <span>Best choices</span>
                            <i class="fa-solid fa-star"></i>
                        </div>

                        <div class="tour-layer__tours grid__row">

                            <div class="tour-layer__tour">
                                <div class="tour__title">
                                    <span>Switzerland</span>
                                    <img src="./img/switzerland-flag.jpg" alt="" class="flag">
                                </div>
                                <img src="./img/switzerland.jpg" alt="" class="tour__img">
                                <div class="tour__info grid__row">
                                    <a href="#" class="button button--black">Read more</a>
                                    <div class="tour__destination">
                                        <div class="des-name">Village Weggis</div>
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        <span>1200</span>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-layer__tour">
                                <div class="tour__title">
                                    <span>Vietnam</span>
                                    <img src="./img/Vietnam-flag.png" alt="" class="flag">
                                </div>
                                <img src="./img/Vietnam.jpg" alt="" class="tour__img">
                                <div class="tour__info grid__row">
                                    <a href="#" class="button button--black">Read more</a>
                                    <div class="tour__destination">
                                        <div class="des-name">Son Doong cave</div>
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        <span> 3,287.45</span>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-layer__tour">
                                <div class="tour__title">
                                    <span>United States</span>
                                    <img src="./img/US-flag.png" alt="" class="flag">
                                </div>
                                <img src="./img/US.jpg" alt="" class="tour__img">
                                <div class="tour__info grid__row">
                                    <a href="#" class="button button--black">Read more</a>
                                    <div class="tour__destination">
                                        <div class="des-name">Hawaii beach</div>
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        <span>2050</span>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-layer__tour">
                                <div class="tour__title">
                                    <span>Italy</span>
                                    <img src="./img/Italy-flag.jpeg" alt="" class="flag">
                                </div>
                                <img src="./img/Italy.jpeg" alt="" class="tour__img">
                                <div class="tour__info grid__row">
                                    <a href="#" class="button button--black">Read more</a>
                                    <div class="tour__destination">
                                        <div class="des-name">Venice city</div>
                                        <i class="fa-solid fa-dollar-sign"></i>
                                        <span>2018</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="suggest-tour">
            <div class="suggest__title">
                <h1>Suggested tours for you</h1>
                <span>Don't know where to go? Let us help you</span>
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="suggest__tours grid__row">

                <div class="card">
                    <div class="card__name">Paris</div>
                    <div class="card__img">
                        <img src="./img/France.png"></img>
                        <div class="card__describe">Eiffel, Rue de Bac, Île Saint, Cathédrale Notre-Dame de Paris</div>
                    </div>
                    <div class="card__detail grid__row">
                        <div class="col-1">
                            <i class="fa-solid fa-heart"></i>
                            <span class="num">3682</span>
                            <div>
                                <a href="" class="more">More info</a>
                            </div>
                        </div>
                        <div class="col-2">
                            <i class="fa-solid fa-comment"></i>
                            <span class="num">3682</span>
                            <div>
                                <i class="fa-solid fa-dollar-sign"></i>
                                <span class="money">1239</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="days">5 days</span>
                            <span class="country">France</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card__name">Paris</div>
                    <div class="card__img">
                        <img src="./img/France.png"></img>
                        <div class="card__describe">Eiffel, Rue de Bac, Île Saint, Cathédrale Notre-Dame de Paris</div>
                    </div>
                    <div class="card__detail grid__row">
                        <div class="col-1">
                            <i class="fa-solid fa-heart"></i>
                            <span class="num">3682</span>
                            <div>
                                <a href="" class="more">More info</a>
                            </div>
                        </div>
                        <div class="col-2">
                            <i class="fa-solid fa-comment"></i>
                            <span class="num">3682</span>
                            <div>
                                <i class="fa-solid fa-dollar-sign"></i>
                                <span class="money">1239</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="days">5 days</span>
                            <span class="country">France</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card__name">Paris</div>
                    <div class="card__img">
                        <img src="./img/France.png"></img>
                        <div class="card__describe">Eiffel, Rue de Bac, Île Saint, Cathédrale Notre-Dame de Paris</div>
                    </div>
                    <div class="card__detail grid__row">
                        <div class="col-1">
                            <i class="fa-solid fa-heart"></i>
                            <span class="num">3682</span>
                            <div>
                                <a href="" class="more">More info</a>
                            </div>
                        </div>
                        <div class="col-2">
                            <i class="fa-solid fa-comment"></i>
                            <span class="num">3682</span>
                            <div>
                                <i class="fa-solid fa-dollar-sign"></i>
                                <span class="money">1239</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="days">5 days</span>
                            <span class="country">France</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card__name">Paris</div>
                    <div class="card__img">
                        <img src="./img/France.png"></img>
                        <div class="card__describe">Eiffel, Rue de Bac, Île Saint, Cathédrale Notre-Dame de Paris</div>
                    </div>
                    <div class="card__detail grid__row">
                        <div class="col-1">
                            <i class="fa-solid fa-heart"></i>
                            <span class="num">3682</span>
                            <div>
                                <a href="" class="more">More info</a>
                            </div>
                        </div>
                        <div class="col-2">
                            <i class="fa-solid fa-comment"></i>
                            <span class="num">3682</span>
                            <div>
                                <i class="fa-solid fa-dollar-sign"></i>
                                <span class="money">1239</span>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="days">5 days</span>
                            <span class="country">France</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="destination grid__row">
            <div class="destination__describe">
                <h2>Travel without boundaries</h2>
                <h2>from here to the horizon</h2>
                <span>Explore every corner of the world</span>
                <p>France</p>
                <p>Vietnam</p>
                <p>Italy</p>
                <p>United States</p>
                <p>Switzerland</p>
                <p>And many destinations other</p>
                <a href="about.html" class="button button--black">More about us</a>
            </div>
            <div class="destination__img">
                <img src="./img/plane.png" alt="" class="img">

                <div class="destination__top grid__row">
                    <img src="./img/switzerland-flag.jpg" alt="" class="flag">
                    <div class="info">
                        <span class="country">Switzerland</span>
                        <div class="country-rate">
                            <i class="fa-solid fa-heart"></i>
                            <span class="num">3682</span>
                            <i class="fa-solid fa-comment"></i>
                            <span class="num">3682</span>
                        </div>
                    </div>
                </div>

                <div class="destination__top grid__row">
                    <img src="./img/Vietnam-flag.png" alt="" class="flag">
                    <div class="info">
                        <span class="country">Vietnam</span>
                        <div class="country-rate">
                            <i class="fa-solid fa-heart"></i>
                            <span class="num">3682</span>
                            <i class="fa-solid fa-comment"></i>
                            <span class="num">3682</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="discount">
            <div class="discount__content">
                <h1 class="discount__tittle">Register now and get discounts</h1>
                <p>Let us serve you with the best service!</p>
                <span>It's our pleasure</span>
                <i class="fa-solid fa-heart"></i>
                <div class="button-register">
                    <a href="./login/register.html" class="button button--black">Let's get it!</a>
                </div>
            </div>

            <div class="discount__count grid__row">
                <div class="years count-item">
                    <p>3</p>
                    <p>Years serving the travel industry</p>
                </div>

                <div class="partnership count-item">
                    <p>25</p>
                    <p>Global partnerships</p>
                </div>

                <div class="award count-item">
                    <p>5</p>
                    <p>Global industry award</p>
                </div>

                <div class="register count-item">
                    <p>2343</p>
                    <p>Registers</p>
                </div>
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
        <script>logoutConfirm();</script>
</body>
</html>