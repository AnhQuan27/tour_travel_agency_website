<?php 
require_once './admin/process/query.php';
session_start();

$tour = new Tour();
$tours = $tour->getData();
$image = new TourImage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours</title>
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    </head>
<body>
    <!-- Header -->
    <div class="container container__wrap">
        <header class="header grid__row grid__full-width">
            <a href="home.php" class="logo">
                <span class="">T2A</span>
            </a>
      
            <ul class="nav grid__row">

                <li class="nav-item">
                    <a href="home.php" class="nav-link" aria-current="page">Home</a>
                </li>

                <li class="nav-item">
                    <a href="tours.html" class="nav-link active">Tours</a>
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
    </div>
    <!-- End of Header -->
    
    <!-- Body -->
    <div class="container container__wrap tour__header">
        <div class="tour__header-text">
            <span class="page-title">Tours available</span>
            <p>All tours available you can choose</p>
        </div>
    </div>

    <div class="container container__wrap tour__body">
        <p class="page-title">All tours</p>
        <div class="tour__card-items grid__row">
            
            <?php foreach($tours as $tour) :
            $id = $tour['tour_ID'];
            $images = $image->getData($id);
            ?>
                
            <div id="myDiv" class="card-item">
                <div class="card__img">
                    <img src="./tours/img/<?php echo $images[0]['image_name']; ?>" alt="">
                    <div class="card__describe"><?php echo $tour['tour_name'] ?></div>
                </div>

                <div class="card__detail">
                    <div class="card__transition">
                        <?php 
                        if (strpos($tour['tour_transport'],"Plane") != false) : ?>
                            <i class="fa-solid fa-plane-up"></i>
                        <?php endif;
                        if (strpos($tour['tour_transport'],"Boat") != false) : ?>
                            <i class="fa-solid fa-ship"></i>
                        <?php endif;
                        if (strpos($tour['tour_transport'],"Train") != false) : ?>
                            <i class="fa-solid fa-train"></i>
                        <?php endif;
                        if (strpos($tour['tour_transport'],"Car") != false) : ?>
                            <i class="fa-solid fa-car"></i>
                        <?php endif;
                        ?>
                    </div>

                    <div class="card__date">
                        <i class="fa-solid fa-calendar"></i>
                        <span class="card__label">Start at:</span>
                        <span><?php echo $tour['tour_start']?></span>
                    </div>

                    <div class="card__time">
                        <i class="fa-solid fa-calendar-week"></i>
                        <span class="card__label">Tour length:</span>
                        <span><?php echo $tour['tour_length']?></span>
                    </div>

                    <div class="card__price">
                        <i class="fa-solid fa-dollar-sign"></i>
                        <span class="card__label">Price:</span>
                        <span class="money"><?php echo $tour['tour_price']?></span>
                    </div>

                    <div class="card__button">
                        <a href="./tours/tour.php?id=<?php echo $tour['tour_ID'] ?>" class="button button--black">More</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

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
            <a href="home.php" class="logo">LOGO</a>
            <ul class="nav grid__row">
                <a href="home.php">
                    <li>Home</li>
                </a>
                <a href="tours.html">
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
    <script src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>logoutConfirm();</script>
    <!-- End of Footer -->
</body>
</html>