<?php 
require_once '../process/query.php';
    
$login = new Login();
$login->checkAdminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New tour</title>
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
                        <a href="../suppliers.php" class="nav-link active">
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
                <h1 class="heading-title mb-3">Add new Supplier</h1>
                <div class="heading-action d-flex justify-content-between align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="../suppliers.php">Supplier list</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Add Supplier</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="detail flex-column d-flex align-items-center">
                    <form method="post" enctype="multipart/form-data" class="d-flex flex-wrap justify-content-between">
                            
                            <div class="input">
                                <label for="id">Supplier ID</label>
                                <input type="text" id="id " class="rounded w-4" name="id">
                            </div>

                            <div class="input">
                                <label for="a_id ">Account ID</label>
                                <input type="text" id="a_id " class="rounded w-4" name="a_id">
                            </div>

                            <div class="input">
                                <label for="name">Supplier name</label>
                                <input type="text" id="name" class="rounded w-8" name="name">
                            </div>

                            <div class="input">
                                <label for="address ">Address</label>
                                <input type="text" id="address " class="rounded w-8" name="address">
                            </div>

                            <div class="input">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="rounded w-4" name="email">
                            </div>
                            
                            <div class="input">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="rounded w-4" name="phone">
                            </div>
                             
                            <div class="input">
                                <label for="note" class="readonly">Note</label>
                                <textarea id="note" class="rounded w-8" name="note"></textarea>
                            </div> 

                            <div class="input w-8">
                                <label for="" class="readonly">Attach file</label>
                                <label for="file" class="custom-file-upload readonly btn button--green w-25 d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    Choose File
                                </label>
                                <input type="file" name="file" id="file">
                            </div>
                            
                            <div class="button-row">
                                <button class="btn button--main border-none rounded" name="submit">Save</button>
                                <a href="../suppliers.php" class="btn btn-secondary rounded border-none">Go back</a>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit'])){
                            $supplier = new Supplier();
                            $data = [
                                'id' => $_POST['id'],
                                'name' => $_POST['name'],
                                'address' => $_POST['address'],
                                'email' => $_POST['email'],
                                'phone' => $_POST['phone'],
                                'note' => $_POST['note'],
                                's_file' => '',
                                'a_id' =>  $_POST['a_id'],
                            ];

                            if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
                                $extension = array('pdf'); 
                                $fileName = $_FILES['file']['name'];
                                $fileNameTmp = $_FILES['file']['tmp_name'];
                                // $file_data = '';
                                
                                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                                if(in_array($ext, $extension)) {
                                    if(!file_exists('./file/' .$fileName)) {
                                        move_uploaded_file($fileNameTmp, './file/'.$fileName);
                                        $file_data = $fileName;
                                    } else {
                                        $fileName = str_replace('.','-', basename($fileName, $ext));
                                        $newFileName = $fileName.time().".".$ext;
                                        move_uploaded_file($fileNameTmp, './file/'.$newFileName);
                                        $file_data = $newFileName;
                                    }
                                }
                                $data['s_file'] = $file_data;
                            }
                            // var_dump($data);
                            try {
                                $supplier->createData($data);
                                echo '<script>submitSuccess("New Supplier has been added!","../suppliers.php")</script>';
                            } catch (PDOException $e) {
                                if($e->getCode() == 23000) {
                                    echo '<script>swalError("This Supplier ID already exists. Please try again!","./add.php")</script>';
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