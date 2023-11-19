
<?php
require_once '../process/query.php';

$login = new Login();
$login->checkAdminLogin();

if($_SESSION['account_role'] == 3){
    header('Location: http://localhost/tour_travel_agency_website/admin/tours.php');
}
$account = new Account();
$data = [
    'id' => $_GET['id']
];
$value = $account->getEachData($data)['0'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User <?php echo $value['account_ID'] ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <header class="navbar sticky-top flex-md-nowrap p-0 border-bottom border-2">
        <a href="admin.php" class="navbar-brand px-3 me-0">Travel agency</a>
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
                    <a href="../dashboard.php" class="nav-link">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

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

                <li class="nav__item">
                    <a href="../suppliers.php" class="nav-link">
                        <i class="fa-solid fa-boxes-packing"></i>
                        <span>Suppliers</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="../orders.php" class="nav-link">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Orders</span>
                    </a>
                </li>

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

                <li class="nav__item">
                    <a href="../account.php" class="nav-link">
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
                          <li class="breadcrumb-item"><a href="../users.php">Users list</a></li>
                          <li class="breadcrumb-item active" aria-current="page">User:</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="detail flex-column d-flex align-items-center">
                        <form method="post" class="d-flex flex-wrap justify-content-between">
                            
                            <?php if($value['account_role'] != 3) : ?>
                                <div class="input">
                                    <label for="f_name" class="readonly" >User first name</label>
                                    <input type="text" readonly id="f_name" class="rounded w-4" name="f_name" value="<?php if(isset($value['staff_first_name'])) {echo $value['staff_first_name'];} else {echo $value['customer_first_name'];}?>">
                                </div>
                                
                                <div class="input">
                                    <label for="l_name" class="readonly" >User last name</label>
                                    <input type="text" readonly id="l_name" class="rounded w-4" name="l_name" value="<?php if(isset($value['staff_last_name'])) {echo $value['staff_last_name'];} else {echo $value['customer_last_name'];}?>">
                                </div>
                            <?php endif ?>

                            <div class="input">
                                <label for="id" class="readonly">Account ID</label>
                                <input type="text" readonly name="id" id="id" class="rounded w-4" value="<?php echo $value['account_ID'] ?>">
                            </div>

                            <div class="input">
                                <label for="user_name" class="readonly">User name</label>
                                <input type="text" name="user_name" readonly id="user_name" class="rounded w-4" value="<?php echo $value['account_username'] ?>">
                            </div>

                            <div class="input">
                                <label for="password">Password</label>
                                <input type="text" id="password" class="rounded w-4" name="password" value="<?php echo $value['account_password'] ?>">
                            </div>

                            <div class="input">
                                <label for="role">Role</label>
                                <select name="role" class="form-select rounded w-4">
                                    <option <?php if($value['account_role'] == 0) { echo 'selected';}?> value="0">0</option>
                                    <option <?php if($value['account_role'] == 1) { echo 'selected';}?> value="1">1</option>
                                    <option <?php if($value['account_role'] == 2) { echo 'selected';}?> value="2">2</option>
                                    <option <?php if($value['account_role'] == 3) { echo 'selected';}?> value="3">3</option>
                                    <option <?php if($value['account_role'] == 4) { echo 'selected';}?> value="4">4</option>
                                </select>
                            </div>

                            <div class="button-row">
                                <button name="submit" class="btn button--main border-none rounded">Save</button>
                                <a href="../users.php" class="btn btn-secondary rounded border-none">Go back</a>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit'])) {
                            $account = new Account();
                            $data = [
                                'a_id' =>$value['account_ID'],
                                'password' => $_POST['password'],
                                'role' => $_POST['role']
                            ];
                            $account->updateData($data);
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