<?php
require_once '../admin/process/query.php';

$login = new Login();
$login->checkAdminLogin();

$search = '';
if(isset($_GET['search'])) {
    $search = $_GET['search'];

    $searching = new Search();

    $orders = $searching->orderSearch($search);
} else {
    $order = new Order();
    $orders = $order->getData();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <header class="navbar sticky-top flex-md-nowrap p-0 border-bottom border-2">
        <a href="http://localhost/tour_travel_agency_website/home.php" class="navbar-brand px-3 me-0">Travel agency</a>
        <div class="avatar-box d-flex align-items-center">
            <?php
            $account = new Account();
            $data = [
                'id' => $_SESSION['account_ID']
            ];
            $value = $account->getEachDataLeftJoin($data)['0'];
            ?>
            <span><?php echo $value['staff_first_name'] . ' ' . $value['staff_last_name'] ?></span>
            <img src="../img/user-img.png" alt="" class="avatar">
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
                        <a href="./dashboard.php" class="nav-link">
                            <i class="fa-solid fa-chart-simple"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                <?php endif ?>

                <li class="nav__item">
                    <a href="./tours.php" class="nav-link">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        <span>Tours</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="./customers.php" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>

                <?php if($_SESSION['account_role'] < 3) : ?>
                    <li class="nav__item">
                        <a href="./suppliers.php" class="nav-link">
                            <i class="fa-solid fa-boxes-packing"></i>
                            <span>Suppliers</span>
                        </a>
                    </li>
                <?php endif ?>

                <li class="nav__item">
                    <a href="./orders.php" class="nav-link active">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Orders</span>
                    </a>
                </li>

                <?php if($_SESSION['account_role'] < 3) : ?>
                <li class="nav__item">
                    <a href="./support.php" class="nav-link">
                        <i class="fa-solid fa-headset"></i>
                        <span>Support Customers</span>
                    </a>
                </li>
                
                    <li class="nav__item">
                        <a href="./users.php" class="nav-link">
                            <i class="fa-solid fa-user"></i>
                            <span>Users</span>
                        </a>
                    </li>
                <?php endif ?>


                <li class="nav__item">
                    <a href="./account.php" class="nav-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>Your account</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar__logout">
                <hr>
                <a href="./process/logout.php" class="nav-link log-out">
                    Logout
                    <span><i class="fa-solid fa-right-from-bracket"></i></span>
                </a>
            </div>
        </div>
        <div class="content me-4">
            <div class="content__heading">
                <h1 class="heading-title mb-3">Orders list</h1>
                <div class="heading-action d-flex justify-content-between align-items-center">
                    <div class="heading__button">
                        <a href="#" class="button button--green rounded export-xlsx">
                            <i class="fa-solid fa-file-excel"></i>
                            <span>Export</span>
                        </a>
                    </div>
                    <form method="get">
                        <div class="search-box">
                            <i class="fa-solid fa-search"></i>
                            <input class="rounded" value="<?php echo $search ?>" type="search" name="search" id="search" placeholder="Search..." >
                        </div>
                    </form>
                </div>
            </div>
            <div class="content__body mt-5 overflow-x-scroll order">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tour name</th>
                            <th>Ordered by</th>
                            <th>Phone number</th>
                            <th>Email</th>
                            <th>Order time</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>  
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order) : ?>
                        <tr>
                            <td><?php echo $order['order_ID']?></td>
                            <td class="w-4"><?php echo $order['tour_name']?></td>
                            <td><?php echo $order['customer_first_name'] . " " . $order['customer_last_name']?></td>
                            <td><?php echo $order['customer_phone']?></td>
                            <td><?php echo $order['customer_email']?></td>
                            <td><?php echo $order['order_time']?></td>
                            <td><?php echo $order['order_number'] * $order['tour_price']?></td>
                            <td class="o_status"><?php echo $order['invoice_status']?></td>
                            <td>
                                <div class="d-flex justify-content-evenly align-items-center">
                                    <a href="./orders/order.php?id=<?php echo $order['order_ID']?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="./process/delete.php?from=orders&id=<?php echo $order['order_ID']?>" class="delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <a href="./orders/invoice.php?id=<?php echo $order['invoice_ID']?>" class="payment-check">
                                        <i class="fa-solid "></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        getOrderStatus()
        // deleteConfirm('Order');
        new DataTable('#myTable', {
            searching:false,
            info: false
        });
        deleteConfirm();
        logoutConfirm();
    </script>
</body>
</html>