<?php 
require_once '../process/query.php';
    
$login = new Login();
$login->checkAdminLogin();
if($_SESSION['account_role'] > 1){
    header('Location: http://localhost/tour_travel_agency_website/admin/tours.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Account</title>
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
            <span><?php echo $acc['staff_first_name'] . ' ' . $acc['staff_last_name'] ?></span>
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
                        <a href="../users.php" class="nav-link active">
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
                <h1 class="heading-title mb-3">Create new Account</h1>
                <div class="heading-action d-flex justify-content-between align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="../users.php">User list</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Create account</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="detail flex-column d-flex align-items-center">
                    <form method="post" enctype="multipart/form-data" class="d-flex flex-wrap justify-content-between">
                            
                            <div class="input">
                                <label for="id">Account ID</label>
                                <input type="text" id="id " class="rounded w-4" name="id">
                            </div>

                            <div class="input">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="rounded w-4" name="username">
                            </div>

                            <div class="input">
                                <label for="password ">Password</label>
                                <input type="text" id="password " class="rounded w-4" name="password">
                            </div>

                            <div class="input">
                                <label for="role">Role</label>
                                <select name="role" class="form-select rounded w-4">
                                <?php if($_SESSION['account_role'] == 0) :?>
                                    <option value="0">0 - Super Admin</option>
                                <?php endif ?>
                                    <option value="1">1 - Admin</option>
                                    <option value="2">2 - Staff</option>
                                    <option value="3">3 - Supplier</option>
                                    <option value="4">4 - Customer</option>
                                </select>
                            </div>
                            
                            <div class="button-row">
                                <button class="btn button--main border-none rounded" name="submit">Save</button>
                                <a href="../users.php" class="btn btn-secondary rounded border-none">Go back</a>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit'])){
                            $account = new Account();
                            $data = [
                                'id' => $_POST['id'],
                                'account' => $_POST['username'],
                                'password' => $_POST['password'],
                                'role' => $_POST['role'],
                            ];
                            try {
                                $account->createData($data);
                                echo '<script>submitSuccess("New Account has been added!","../users.php")</script>';
                            } catch (PDOException $e) {
                                // $error = $e->getTraceAsString();
                                if($e->getCode() == 23000) {
                                    if(str_contains($e, 'account_username') == true) {
                                        echo '<script>swalError("This Username already exists. Please try again!","./add.php")</script>';
                                    }
                                    if(str_contains($e, 'PRIMARY') == true) {
                                        echo '<script>swalError("This Account ID already exists. Please try again!","./add.php")</script>';
                                    }
                                    exit();
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="content__body mt-5">
               <!-- <a href=""></a>  -->
            </div>
        </div>
    </div>
    <script src="../../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // detailSubmit('tour');
        logoutConfirm();
    </script>
</body>
</html>