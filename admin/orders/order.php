
<?php
require_once '../process/query.php';
$order = new Order();
$data = [
    'o_id' => $_GET['id']
];
$value = $order->getEachData($data)['0'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order <?php echo $value['order_ID'] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <header class="navbar sticky-top flex-md-nowrap p-0 border-bottom border-2">
        <a href="admin.html" class="navbar-brand px-3 me-0">Travel agency</a>
        <div class="avatar-box d-flex align-items-center">
            <span>User001</span>
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
                
                <li class="nav__item">
                    <a href="../dashboard.html" class="nav-link">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../tours.html" class="nav-link">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        <span>Tours</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../customers.html" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../suppliers.html" class="nav-link">
                        <i class="fa-solid fa-boxes-packing"></i>
                        <span>Suppliers</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../orders.html" class="nav-link active">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Orders</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../support.html" class="nav-link">
                        <i class="fa-solid fa-headset"></i>
                        <span>Support Customers</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../users.html" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../account.html" class="nav-link">
                        <i class="fa-solid fa-gear"></i>
                        <span>Your account</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar__logout">
                <hr>
                <a href="#" class="nav-link">
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
                          <li class="breadcrumb-item"><a href="../suppliers.html">Orders list</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Order: <?php echo $value['order_ID'] ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="detail flex-column d-flex align-items-center">
                        <form method="post" class="d-flex flex-wrap justify-content-between">
                            <div class="input">
                                <label for="t_name" class="readonly">Tour name</label>
                                <input type="text" readonly id="t_name" class="rounded w-8" name="t_name" value="<?php echo $value['tour_name']?>">
                            </div>
                            
                            <div class="input">
                                <label for="o_id" class="readonly">Order ID</label>
                                <input type="text" readonly id="o_id" class="rounded w-4" name="o_id" value="<?php echo $value['order_ID']?>">
                            </div>

                            <div class="input">
                                <label for="t_price" class="readonly">Total price</label>
                                <input type="text" readonly id="t_price " class="rounded w-4" value="<?php echo $value['tour_price'] * $value['order_number']?>">
                            </div>

                            <div class="input">
                                <label for="o_by" class="readonly">Ordered by</label>
                                <input type="text" readonly id="o_by" class="rounded w-4" value="<?php echo $value['customer_first_name'] . " " . $value['customer_last_name']?>">
                            </div>

                            <div class="input">
                                <label for="o_time">Order time</label>
                                <input type="date" id="o_time" class="rounded w-4" name="o_time" value="<?php echo $value['order_time']?>">
                            </div>

                            <div class="input">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="rounded w-4" name="phone" value="<?php echo $value['order_phone'] ?>">
                            </div>
                             
                            <div class="input">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="rounded w-4" name="email" value="<?php echo $value['order_email'] ?>">
                            </div>
                            
                            <div class="input">
                                <label for="status" class="readonly">Status</label>
                                <input type="text" id="status" class="rounded w-4" readonly value="<?php echo $value['invoice_status']?>">
                            </div>

                            <div class="input">
                                <label for="number">Number</label>
                                <input type="text" id="number" class="rounded w-4" name="number" value="<?php echo $value['order_number'] ?>">
                            </div>

                            <div class="input">
                                <label for="note" class="readonly">Note</label>
                                <textarea id="note" class="rounded w-8" name="note"><?php echo $value['order_note']?></textarea>
                            </div> 

                            <div class="button-row">
                                <button name="submit" class="btn button--main border-none rounded">Save</button>
                                <a href="../orders.php" class="btn btn-secondary rounded border-none">Go back</a>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit'])) {
                            $order = new Order();
                            $data = [
                                'id' => $_GET['id'],
                                'o_time' => $_POST['o_time'],
                                'phone' => $_POST['phone'],
                                'email' => $_POST['email'],
                                'o_number' => $_POST['number'],
                                'note' => $_POST['note']
                            ];
                            $order->updateData($data);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="content__body mt-5">
                
            </div>
        </div>
    </div>
    <script src="../../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // detailSubmit('order');
    </script>
</body>
</html>