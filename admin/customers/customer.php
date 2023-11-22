<?php
require_once '../process/query.php';

$login = new Login();
$login->checkAdminLogin();

$customer = new Customer();
$data = [
    'id' => $_GET['id']
];
$value = $customer->getEachData($data)['0'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer ID: <?php echo $value['customer_ID']?></title>
    <script src="../../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <header class="navbar sticky-top flex-md-nowrap p-0 border-bottom border-2">
        <a href="http://localhost/tour_travel_agency_website/home.php" class="navbar-brand px-3 me-0">Travel agency</a>
        <div class="avatar-box d-flex align-items-center">
            <?php
            $account = new Account();
            $dataAcc = [
                'id' => $_SESSION['account_ID']
            ];
            $acc = $account->getEachDataLeftJoin($dataAcc)['0'];
            ?>
            <?php if($_SESSION['account_role'] <=2) :?>
            <span><?php echo $acc['staff_first_name'] . ' ' . $acc['staff_last_name'] ?></span>
            <?php endif ?>
            <?php if($_SESSION['account_role'] == 3) :?>
            <span><?php echo $acc['supplier_name']?></span>
            <?php endif ?>
            <img src="../../img/user-img.png" alt="" class="avatar">
        </div>
    </header>
    <div class="container-fluid">
        <div class="sidebar d-flex flex-column p-3 d-flex justify-content-between">
            
        <ul class="nav nav-pills flex-column mb-auto">   
                <!-- <li class="nav__item">
                    <a href="" class="nav-link active">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>
                </li> -->

                <?php if($_SESSION['account_role'] < 3) : ?>
                <li class="nav__item">
                    <a href="../dashboard.php" class="nav-link">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php endif ?>

                <li class="nav__item">
                    <a href="../tours.php" class="nav-link">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        <span>Tours</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../customers.php" class="nav-link active">
                        <i class="fa-solid fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>

                <?php if($_SESSION['account_role'] < 3) : ?>
                    <li class="nav__item">
                        <a href="../suppliers.php" class="nav-link">
                            <i class="fa-solid fa-boxes-packing"></i>
                            <span>Suppliers</span>
                        </a>
                    </li>
                <?php endif ?>

                <li class="nav__item">
                    <a href="../orders.php" class="nav-link">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Orders</span>
                    </a>
                </li>

                <?php if($_SESSION['account_role'] < 3) : ?>
                <li class="nav__item">
                    <a href="../support.php" class="nav-link">
                        <i class="fa-solid fa-headset"></i>
                        <span>Support Customers</span>
                    </a>
                </li>
                
                    <li class="nav__item">
                        <a href="../users.php" class="nav-link">
                            <i class="fa-solid fa-user"></i>
                            <span>Users</span>
                        </a>
                    </li>
                <?php endif ?>

                <li class="nav__item">
                    <a href="../account.php" class="nav-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>Your account</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar__logout">
                <hr>
                <a href="../process/logout.php" class="nav-link log-out">
                    Logout
                    <span><i class="fa-solid fa-right-from-bracket"></i></span>
                </a>
            </div>
        </div>
        <div class="content me-4">
            <div class="content__heading">
                <h1 class="heading-title mb-3">Detail</h1>
                <div class="heading-action d-flex justify-content-between align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="../customers.php">Customers list</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Customer: <?php echo $value['customer_first_name']?> <?php echo $value['customer_last_name']?></li>
                        </ol>
                    </nav>
                </div>
                <hr>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="detail flex-column d-flex align-items-center">
                        <form method="post" class="d-flex flex-wrap justify-content-between">

                            <div class="input">
                                <label for="id" class="readonly">Customer ID</label>
                                <input type="text" id="id" readonly class="rounded w-4" name="id" value="<?php echo $_GET['id'] ?>">
                            </div>

                            <div class="input">
                                <label for="a_id" class="">Account ID</label>
                                <input type="text" id="a_id" class="rounded w-4" name="a_id" value="<?php echo $value['account_ID'] ?>">
                            </div>

                            <div class="input">
                                <label for="f_name">First name</label>
                                <input type="text" id="f_name" class="rounded w-4" name="f_name" value="<?php echo $value['customer_first_name'] ?>">
                            </div>
                            
                            <div class="input">
                                <label for="l_name">Last name</label>
                                <input type="text" id="l_name" class="rounded w-4" name="l_name" value="<?php echo $value['customer_last_name'] ?>">
                            </div>

                            <div class="input w-4">
                                <label>Gender</label>
                                <div class="d-flex ">
                                    <div class="d-flex align-items-center me-5 gender-male grid__row">
                                        <input type="radio" name="gender" value="Male" class="me-2" <?php if($value['customer_gender'] == 'Male') {echo 'checked';} ?>>
                                        <label for="" class="readonly ">Male</label>
                                    </div>
                                    <div class="d-flex align-items-center gender-female grid__row">
                                        <input type="radio" name="gender" value="Female" class="me-2" <?php if($value['customer_gender'] == 'Female') {echo 'checked';} ?>>
                                        <label for="" class="readonly ">Female</label>
                                    </div>  
                                </div>
                            </div>
                            
                            <div class="input">
                                <label for="birthday">Birthday</label>
                                <input type="date" id="birthday" class="rounded w-4" name="birthday" value="<?php echo $value['customer_birthday']?>">
                            </div>
                            
                            <div class="input"> 
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="rounded w-4" name="phone" value="<?php echo $value['customer_phone']?>">
                            </div>

                            <div class="input">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="rounded w-4" name="email" value="<?php echo $value['customer_email']?>">
                            </div>
                            
                            <div class="input">
                                <label for="address">Address</label>
                                <input type="text" id="address" class="rounded w-8" name="c_address" value="<?php echo $value['customer_address']?>">
                            </div>
                            
                            <div class="button-row">
                                <button class="btn button--main border-none rounded" name="submit">Save</button>
                                <a href="../customers.php" class="btn btn-secondary rounded border-none">Go back</a>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit'])) {
                            $customer = new Customer();
                            $data = [
                                'id' => $_GET['id'],
                                'f_name' => $_POST['f_name'],
                                'l_name' => $_POST['l_name'],
                                'gender' => $_POST['gender'],
                                'birthday' => $_POST['birthday'],
                                'phone' => $_POST['phone'],
                                'email' => $_POST['email'],
                                'c_address' => $_POST['c_address'],
                                'a_id' => $_POST['a_id']
                            ];
                            try {
                                $customer->updateData($data);
                                echo '<script>submitSuccess("Customer has been updated!","../customers.php");</script>';
                            } catch (Exception $e) {
                                echo $e;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="content__body mt-5">
                <h1 class="heading-title mb-3">Booking history</h1>
                <hr>
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Tour ID</td>
                        <td>Tour name</td>
                        <td>Number</td>
                        <td>Total price</td>
                        <td>Payment method</td>
                        <td>Time</td>
                        <td>Status</td>
                    </tr>
                    <?php
                    $order = new Order();
                    $data = [
                        'id' => $_GET['id']
                    ];
                    $orders = $order->getDataWhereCustomerID($data);
                    foreach($orders as $order) :?>
                    <tr>
                        <td><?php echo $order['tour_ID']?></td>
                        <td><?php echo $order['tour_name']?></td>
                        <td><?php echo $order['order_number']?></td>
                        <td><?php echo $order['tour_price'] * $order['order_number']?></td>
                        <td><?php echo $order['invoice_method']?></td>
                        <td><?php echo $order['order_time']?></td>
                        <td class="o_status"><?php echo $order['invoice_status']?></td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
    <script src="../../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const statusArr = document.querySelectorAll('.o_status');
        statusArr.forEach((status, index) => {
            if(status.innerHTML == 'Paid') {
                status.classList.add('paid');
            }
            if(status.innerHTML == 'Unpaid') {
                status.classList.add('unpaid');
            }
        })
        logoutConfirm();
        // detailSubmit('customer');
    </script>
</body>
</html>