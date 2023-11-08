<?php
require_once '../process/query.php';
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
                    <a href="../customers.html" class="nav-link  active">
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
                    <a href="../orders.html" class="nav-link">
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
                          <li class="breadcrumb-item"><a href="../customers.html">Customers list</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Customer: <?php echo $value['customer_first_name']?> <?php echo $value['customer_last_name']?></li>
                        </ol>
                    </nav>
                </div>
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
                            $customer->updateData($data);
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
        // detailSubmit('customer');
    </script>
</body>
</html>