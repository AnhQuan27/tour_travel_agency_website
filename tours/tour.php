<?php 
require_once '../admin/process/query.php';
session_start();

$tour = new Tour();
$tour_image = new TourImage();
date_default_timezone_set("Asia/Ho_Chi_Minh");
$data = [
    't_id' => $_GET['id']
];

$id = $_GET['id'];
$tour_images = $tour_image->getData($id);
$value = $tour->getEachData($data)['0'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $value['tour_name']?></title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>    
</head>
<body>
    <div class="toast-mess toast-mess--error slide-in-right grid__row disable">
        <i class="fa-solid" id="icon"></i>
        <div class="toast-mess__text">
            <h3></h3>
            <span></span>
        </div>
        <i class="fa-solid fa-xmark" id="close-modal"></i>
    </div>

    <!-- Header -->

    <div class="container__wrap">
        <header class="header grid__row grid__full-width">
            <a href="home.html" class="logo">
                <span class="">T2A</span>
            </a>
      
            <ul class="nav grid__row">

                <li class="nav-item">
                    <a href="../home.html" class="nav-link" aria-current="page">Home</a>
                </li>

                <li class="nav-item">
                    <a href="../tours.php" class="nav-link active">Tours</a>
                </li>

                <li class="nav-item">
                    <a href="../community.html" class="nav-link">Community</a>
                </li>

                <li class="nav-item">
                    <a href="../about.html" class="nav-link">About Us</a>
                </li>

                <li class="nav-item">
                    <a href="../faqs.html" class="nav-link">FAQs</a>
                </li>

                <?php 
                    if(isset($_SESSION['account_role'])) {
                ?>
                    <li class="nav-item">
                        <a href="<?php
                        if($_SESSION['account_role'] > 3) {
                            echo '../user.php';
                        } else {
                            echo '../admin/tours.php';
                        }
                        ?>" class="nav-link">
                            <i class="fa-solid fa-circle-user"></i>
                        <span><?php echo $_SESSION['account_username'] ?></span>
                    </a>
                </li>
                
                <li class="nav-item logout-item grid__row">
                    <a href="../admin/process/logout.php" class="">
                        Logout
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </li>
                <?php
                } else { 
                ?>
                <li class="nav-item">
                    <a href="../login/login.php" class="button button--main">Login</a>
                </li>
                
                <li class="nav-item">
                    <a href="../login/register.php" class="button button--return">Register</a>
                </li>
                <?php } ?>
            </ul>
        </header>
    </div>
    <!-- End of Header -->
    
    <!-- Body -->
    <div class="container__wrap container">
        <div class="breadscrumb grid__row">

            <a href="../home.html" class="grid__row">
                <i class="fa-solid fa-house"></i>
                Home
            </a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="../tours.php">All tours</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span href="./tour.html">
                <?php echo $value['tour_name']?>
            </span>
        </div>

        <div class="detail-tour__hero grid__row">
            <div class="detail-tour__img">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach($tour_images as $tour_image) :?>
                        <div class="img swiper-slide">
                            <img class="" src="./img/<?php echo $tour_image['image_name'] ?>" alt="">
                        </div>
                        <?php endforeach;?>
                        <!-- <div class="img swiper-slide">
                            <img class="" src="./img/US.jpg" alt="">
                        </div>
        
                        <div class="img swiper-slide">
                            <img class="" src="./img/France.png" alt="">
                        </div> -->
                    </div>
                    <div class="swiper-button-prev swiper-button"></div>
                    <div class="swiper-button-next swiper-button"></div>
                </div>
            </div>

            <div class="detail-tour__description">
                <h1><?php echo $value['tour_name']?></h1>
                <span class="detail__tour-length"><?php echo $value['tour_length']?></span>
                <i class="fa-solid fa-circle"></i>
                <span class="detail__tour-rate">5.0</span>
                <i class="fa-solid fa-star"></i>
                <span class="detail__tour-rate-number">(42)</span>

                <div class="start-end">
                    From
                    <span><?php echo $value['tour_from']?></span>
                    to
                    <span><?php echo $value['tour_to']?></span>
                </div>

                <div class="detail__tour-other grid__row">
                    <div class="detail__tour-max">
                        <span>Max group size:</span>
                        <p><?php echo $value['tour_number']?></p>
                    </div>

                    <!-- <div class="detail__tour-remain">
                        <span>Remaining number:</span>
                        <p>12</p>
                    </div> -->

                    <div class="detail__tour-age">
                        <span>Age range:</span>
                        <p><b>18</b> to <b>36</b></p>
                    </div>

                    <div class="detail__tour-id">
                        <span>Tour id:</span>
                        <p><?php echo $value['tour_ID']?></p>
                    </div>

                    <div class="detail__tour-price">
                        <span>Price:</span>
                        <p id="unit_price" class="money"><?php echo $value['tour_price']?></p>
                        <span><b>(USD)</b> per Traveler</span>
                    </div>

                    <div class="detail__tour-itinerary">
                        <span>Itinerary:</span>
                        <p><?php echo $value['tour_itinerary']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tour-input">
        <div class="container__wrap">
            <div class="tour-overview tour-ticket-box">
                <h1>Your adventure overview</h1>
                <div class="overview-tab grid__row">
                    <div class="day-start-end">
                        <?php 
                            $tourStart = $value['tour_start'];
                            $tourEnd = $value['tour_end'];
                            
                            $formattedStart = date("l, jS F, Y", strtotime($tourStart));
                            $formattedEnd = date("l, jS F, Y", strtotime($tourEnd));
                        ?>
                        <div class="day-start">From <b><?php echo $formattedStart?></b></div>
                        <div class="day-end">to <b><?php echo $formattedEnd?></b></div>
                    </div>
                    <div class="tour-booking-note">
                        <div class="row-1 grid__row">
                            <i class="fa-solid fa-circle-info"></i>
                            <div class="text">Space on this tour is not guaranteed. Book this tour to request your place and the operator will be in touch to confirm availability. If space is unavailable, we will offer alternative options.</div>
                        </div>
                        <div class="row-2 grid__row">
                            <i class="fa-solid fa-circle-check"></i>
                            <div class="text">You will only be charged once your space is confirmed</div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="tour-number-booking tour-ticket-box">
                    <input class="disable" type="text" name="id" value="<?php echo time() ?>">
                    <span class="number-count">1</span>
                    <span class="title">How many are traveling?</span>
                    <div class="travelers form-ticket grid__row">
                        <label for="">Travelers</label>
                        <div class="grid__row" style="align-items: center;">
                            <div class="minus">-</div>
                            <input type="text" name="number" id="number" class="num-travelers" value="1" readonly>
                            <div class="plus">+</div>
                        </div>
                    </div>
                </div>

                <div class="tour-detail-booking tour-ticket-box">
                    <span class="number-count">2</span>
                    <span class="title">Add traveler details</span>
                    <div class="detail-note grid__row">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>
                            <b>Please note: </b>
                            Traveler details should match information on passport
                        </span>
                    </div>
                    <?php
                    $account = new Account();
                    if(isset($_SESSION['account_role'])) {
                        $data = [
                            'id' => $_SESSION['account_ID']
                        ];
                        $value = $account->getEachDataLeftJoin($data)['0'];
                        $role = $_SESSION['account_role']; 
                    }
                    ?>
                    <div class="grid__row">
                        <div class="detail form-ticket grid__row">
                            <div class="input-detail">
                                <div class="first-name">
                                    <label for="first" class="readonly">First name</label>
                                    <input type="text" name="firstName" readonly id="first" value="<?php 
                                    if(isset($role)) {
                                        if($role < 3) {
                                            echo $value['staff_first_name']; 
                                        } else if($role == 4) {
                                            echo $value['customer_first_name'];
                                        }
                                    }?>">
                                </div>
                            </div>
    
                            <div class="input-detail">
                                <div class="last-name">
                                    <label for="last" class="readonly">Last name</label>
                                    <input type="text" readonly name="lastName" id="last" value="<?php 
                                    if(isset($role)) {
                                        if($role < 3) {
                                            echo $value['staff_last_name']; 
                                        } else if($role == 4) {
                                            echo $value['customer_last_name'];
                                        }
                                    }?>">
                                </div>
                            </div>
    
                            <div class="input-detail">
                                <div class="email">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" value="<?php 
                                    if(isset($role)) {
                                        if($role < 3) {
                                            echo $value['staff_email']; 
                                        } else if($role == 4) {
                                            echo $value['customer_email'];
                                        }
                                    }?>">
                                </div>
                            </div>
    
                            <div class="input-detail">
                                <div class="time">
                                    <label class="readonly">Order time</label>
                                    <input readonly type="text" name="time" id="time" value="<?php echo date("Y-m-d H:i:s") ?>">
                                </div>
                            </div>
    
                            <div class="input-detail">
                                <div class="phone">
                                    <label>Phone</label>
                                    <input type="text" name="phone" id="phone" value="<?php 
                                    if(isset($role)) {
                                        if($role < 3) {
                                            echo $value['staff_phone']; 
                                        } else if($role == 4) {
                                            echo $value['customer_phone'];
                                        }
                                    }?>">
                                </div>
                            </div>
    
                            <div class="input-detail">
                                <div class="day-of-birth">
                                    <label for="day-of-birth" class="readonly">Day of birth</label>
                                    <input type="date" readonly name="birthDay" id="day-of-birth" value="<?php 
                                    if(isset($role)) {
                                        if($role == 4) {
                                            echo $value['customer_birthday']; 
                                        }
                                    }
                                    ?>">
                                </div>
                            </div>

                            <div class="input-detail input-gender">
                                <div class="gender">
                                    <div class="gender-box grid__row">
                                        <h2>Gender</h2>
                                        <div class="gender-male grid__row">
                                            <label class="readonly">Male</label>
                                            <input type="radio" name="gender" value="Male" <?php if(isset($role)  && $role == 4 && $value['customer_gender'] == 'Male') {echo 'checked';}?>>
                                        </div>
                                        <div class="gender-female grid__row">
                                            <label class="readonly">Female</label>
                                            <input type="radio" name="gender" value="Female" <?php if(isset($role)  && $role == 4 && $value['customer_gender'] == 'Female') {echo 'checked';}?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="button--main button button-confirm" id="confirm_button">Confirm</span>
                        </div>
                    </div>
                </div>
                <div class="tour-detail-booking tour-ticket-box invoice-box disable">
                    <span class="number-count">3</span>
                    <span class="title">Your invoice</span>
                    <div class="detail-note grid__row">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>
                            <b>Please note: </b>
                            If you choose cash payment, please press <b>Booking button</b> and come directly to <a href="https://maps.app.goo.gl/tFafC1Kuq8c5h3YT9" target="_blank">our Agency</a>
                        </span>
                    </div>

                    <div class="detail-note grid__row" style="margin-top: 1rem; margin-bottom: 2rem;">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>
                            <?php
                            $currentTime = new DateTime();
                            $sevenDaysLater = $currentTime->modify('+7 days');
                            $formattedDate = $sevenDaysLater->format('d/m/Y H:i:s');
                            ?>
                            <b>Please note: </b>
                            After pressing <b>Booking button</b>, your invoice will be saved for up to <b>7 days</b>. Please complete payment before <b><?php echo $formattedDate?></b></a>
                        </span>
                    </div>
                    <div class="invoice grid__row">
                        <div class="invoice-detail grid__row">
                            <div>
                                <span>Your first name: </span>
                                <span style="font-weight: 300;" class="f-name"><?php if(isset($role) && $role == 4) {echo $value['customer_first_name'];} ?></span>
                            </div>
                            <div>
                                <span>Your last name: </span>
                                <span style="font-weight: 300;" class="l-name"><?php if(isset($role) && $role == 4) {echo $value['customer_last_name'];} ?></span>
                            </div>
                            <div>
                                <span>Your email: </span>
                                <span style="font-weight: 300;" class="ur-email"></span>
                            </div>
                            <div>
                                <span>Your phone: </span>
                                <span style="font-weight: 300;" class="ur-phone"></span>
                            </div>
                            <div>
                                <span>Order time: </span>
                                <span style="font-weight: 300;" class="o-time"> <?php echo date("Y-m-d H:i:s") ?></span>
                            </div>
                            <div>
                                <span>Your birthday: </span>
                                <span style="font-weight: 300;" class="ur-birthday"><?php 
                                if(isset($role)) {
                                        if($role == 4) {
                                            echo $value['customer_birthday']; 
                                        }
                                    }?></span>
                            </div>
                            <div>
                                <span>Your gender: </span>
                                <span style="font-weight: 300;" class="ur-gender"></span>
                            </div>

                            <div>
                                <span>Number of orders: </span>
                                <span style="font-weight: 300;" class="o-num"></span>
                            </div>
                        </div>
                        
                        
                        <div class="button-booking">
                            <div class="button-upload">
                                    <div for="" class="readonly">Successful transaction image</div>
                                    <label for="image" class="custom-file-upload readonly button--green">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        Choose File
                                    </label>
                                    <input type="file" name="image" id="image" accept="image/*">
                            </div>
                            <br>
                            <h2 class="total-price-title">Total price</h2>
                            <span class="total-price money" id="total_price"></span>
                            <i class="fa-solid fa-dollar-sign"></i>
                            <p>per Traveler</p>
                            <button name="submit" class="button--main button" id="booking-button">Book <span id="num_travelers" style="margin: 0;"></span> space</button>
                        </div>
                        <div class="qr_code">
                            <h2>Scan QR code to complete payment</h2>
                            <img src="../img/Banking_qrcode.png" alt="">
                        </div>
                    </div>
                </div>
            </form>
            <?php
            if(isset($_POST['submit'])) {
                $order = new Order();
                $data = [
                        'id' => $_POST['id'],
                        'number' => $_POST['number'],
                        'time' => $_POST['time'],
                        'phone' => $_POST['phone'],
                        'email' => $_POST['email'],
                        't_id' => $_GET['id'],
                        'c_id' => $value['customer_ID'],
                        'note' => '',
                ];
                // var_dump($data);
                $order->createData($data);
                
                if(isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                    $image_id = [
                        'id' => $_POST['id']
                    ];
                }
                $invoice = new Invoice();
                $invoice_ID = 'invoice' . count($invoice->getData()) +1;
                if(isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                    $extension = array('jpeg','jpg', 'png', 'gif'); 
                    $fileName = $_FILES['image']['name'];
                    $fileNameTmp = $_FILES['image']['tmp_name'] ;
                    
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    if(in_array($ext, $extension)) {
                        if(!file_exists('./img/' .$fileName)) {
                            move_uploaded_file($fileNameTmp, '../admin/orders/img/'.$fileName);
                            $file_data = $fileName;
                        } else {
                            $fileName = str_replace('.','-', basename($fileName, $ext));
                            $newFileName = $fileName.time().".".$ext;
                            move_uploaded_file($fileNameTmp, '../admin/orders/img/'.$newFileName);
                            $file_data = $newFileName;
                        }
                    }
                    $data_img = [
                        'id' => $invoice_ID,
                        'o_id' => $_POST['id'],
                        'status' => 'Unpaid',
                        'method' => 'Banking',
                        'note' => '',
                        'invoice_img_receive' => $file_data,
                        'invoice_img_check' => '',
                    ];
                    // var_dump($data_img);
                } else {
                    $data_img = [
                        'id' => $invoice_ID,
                        'o_id' => $_POST['id'],
                        'status' => 'Unpaid',
                        'method' => 'Cash',
                        'note' => '',
                        'invoice_img_receive' => '',
                        'invoice_img_check' => '',
                    ];
                }
                $invoice->createData($data_img);
                // var_dump($data_img);
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
            <a href="home.html" class="logo">LOGO</a>
            <ul class="nav grid__row">
                <a href="../home.html">
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
    <script>
        countNumberOfTraveler();
        swiper();
        validateBooking();
        closeToastMessage();
        showInvoice();
    </script>
    
</body>
</html>