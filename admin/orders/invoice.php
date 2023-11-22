<?php
require_once '../process/query.php';

$login = new Login();
$login->checkAdminLogin();

$order = new Order();
$data = [
    'i_id' => $_GET['id']
];
$value = $order->getEachDataWhereInvoiceID($data)['0'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice <?php echo $value['invoice_ID'] ?></title>
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
                    <a href="../customers.php" class="nav-link">
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
                    <a href="../orders.php" class="nav-link active">
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
                <h1 class="heading-title mb-3">Invoice</h1>
                <div class="heading-action d-flex justify-content-between align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="../orders.php">Orders list</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Checking invoice name</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="detail payment flex-column d-flex align-items-center">
                        <form method="post" enctype="multipart/form-data" class="d-flex flex-wrap justify-content-between">

                            <div class="input">
                                <label for="o_id" class="readonly">Order ID</label>
                                <input type="text" name="o_id" readonly id="o_id" class="rounded w-4" value="<?php echo $value['order_ID']?>">
                            </div>

                            <div class="input">
                                <label for="name" class="readonly">Name</label>
                                <input type="text" readonly id="name" class="rounded w-4" value="<?php echo $value['customer_first_name'] ." " . $value['customer_last_name']?>">
                            </div>

                            <div class="input">
                                <label for="phone" class="readonly">Phone</label>
                                <input type="text" readonly id="phone" class="rounded w-4" value="<?php echo $value['order_phone'] ?>">
                            </div>

                            <div class="input">
                                <label for="u_price" class="readonly">Unit price</label>
                                <input type="text" readonly id="u_price" class="rounded w-4" value="<?php echo $value['tour_price'] ?>">
                            </div>

                            <div class="input">
                                <label for="t_price" class="readonly">Total price</label>
                                <input type="text" readonly id="t_price" class="rounded w-4" value="<?php echo $value['tour_price'] * $value['order_number'] ?>">
                            </div>

                            <div class="input">
                                <label for="number" class="readonly">Number</label>
                                <input type="text" readonly id="number" class="rounded w-4" value="<?php echo $value['order_number'] ?>">
                            </div>

                            <div class="input">
                                <label for="method">Methods</label>
                                <select name="method" class="form-select rounded w-4" id="method">
                                    <option <?php if($value['invoice_method'] == 'Banking') {echo 'selected';}?> value="Banking">Banking</option>
                                    <option <?php if($value['invoice_method'] == 'Cash') {echo 'selected';}?> value="Cash">Cash</option>
                                  </select>
                            </div>

                            <div class="input">
                                <label for="check">Check status</label>
                                <select name="check_status" class="form-select rounded w-4" id="check">
                                    <option <?php if($value['invoice_status'] == 'Paid') {echo 'selected';}?> value="Paid">Paid</option>
                                    <option <?php if($value['invoice_status'] == 'Unpaid') {echo 'selected';}?> value="Unpaid">Unpaid</option>
                                  </select>
                            </div>

                            <div class="input">
                                <label for="note" class="label-note">Note</label>
                                <textarea id="note" class="rounded w-8" name="note"><?php echo $value['invoice_note'] ?></textarea>
                            </div> 

                            <div class="input w-8">
                                <label for="" class="readonly">Attach file</label>
                                <label for="image" class="custom-file-upload readonly btn button--green w-25 d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    Choose File
                                </label>
                                <input type="file" name="image" id="image" accept="image/*">
                            </div> 

                            <div class="view-images d-flex justify-content-around rounded border-2 p-4 border w-8">
                                <div class="d-flex align-items-center flex-column">
                                    <h3>Receive</h3>
                                    <img class="" src="./img/<?php echo $value['invoice_img_receive'] ?>" alt="">
                                </div>

                                <div class="d-flex align-items-center flex-column">
                                    <h3>Check</h3>
                                    <img class="" src="./img/<?php echo $value['invoice_img_check'] ?>" alt="">
                                </div>
                            </div>

                            <div class="button-row">
                                <button name="submit"class="btn button--main border-none rounded">Save</button>
                                <a href="../orders.php" class="btn btn-secondary rounded border-none">Go back</a>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit'])) {
                            $invoice = new Invoice();
                            if(isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                                $extension = array('jpeg','jpg', 'png', 'gif'); 
                                $fileName = $_FILES['image']['name'];
                                $fileNameTmp = $_FILES['image']['tmp_name'];
                                $file_data = $value['invoice_img_check'];
                                
                                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                                if(in_array($ext, $extension)) {
                                    if(!file_exists('./img/' .$fileName)) {
                                        move_uploaded_file($fileNameTmp, './img/'.$fileName);
                                        $file_data = $fileName;
                                    } else {
                                        $fileName = str_replace('.','-', basename($fileName, $ext));
                                        $newFileName = $fileName.time().".".$ext;
                                        move_uploaded_file($fileNameTmp, './img/'.$newFileName);
                                        $file_data = $newFileName;
                                    }
                                }
                                $data = [
                                    'id' => $_GET['id'],
                                    'o_id' => $_POST['o_id'],
                                    'check_status' => $_POST['check_status'],
                                    'method' => $_POST['method'],
                                    'note' => $_POST['note'],
                                    'invoice_img_check' => $file_data
                                ];
                            } else {
                                $data = [
                                    'id' => $_GET['id'],
                                    'o_id' => $_POST['o_id'],
                                    'check_status' => $_POST['check_status'],
                                    'method' => $_POST['method'],
                                    'note' => $_POST['note'],
                                    'invoice_img_check' => $value['invoice_img_check']
                                ];
                                // echo $value['invoice_img_check'] .'1';
                            }
                            // print_r($data);
                            $invoice->updateData($data);
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
        logoutConfirm();
        // detailSubmit('order');
    </script>
</body>
</html>