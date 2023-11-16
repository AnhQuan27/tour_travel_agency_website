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
            $data = [
                'id' => $_SESSION['account_ID']
            ];
            $value = $account->getEachDataLeftJoin($data)['0'];
            ?>
            <span><?php echo $value['staff_first_name'] . ' ' . $value['staff_last_name'] ?></span>
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
                    <a href="../tours.php" class="nav-link active">
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
                    <a href="../users.php" class="nav-link">
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
                <h1 class="heading-title mb-3">Add new tour</h1>
                <div class="heading-action d-flex justify-content-between align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="../tours.php">Tours list</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Add tour</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="detail flex-column d-flex align-items-center">
                        <form method="post" enctype="multipart/form-data" class="d-flex flex-wrap justify-content-between">
                            <div class="input">
                                <label for="t_name">Tour name</label>
                                <input type="text" id="t_name" class="rounded w-8" name="t_name">
                            </div>
                            
                            <div class="input">
                                <label for="t_id">Tour ID</label>
                                <input type="text" id="t_id" class="rounded w-4" name="t_id">
                            </div>

                            <div class="input">
                                <label for="price">Price</label>
                                <input type="text" id="price" class="rounded w-4" name="price">
                            </div>

                            <div class="input">
                                <label for="transport">Transport</label>
                                <input type="text" id="transport" class="rounded w-4" name="transport">
                            </div>
                            
                            <div class="input">
                                <label for="start">Start</label>
                                <input type="date" id="start" class="rounded w-4" name="start">
                            </div>
                            
                            <div class="input">
                                <label for="end">End</label>
                                <input type="date" id="end" class="rounded w-4" name="end">
                            </div>

                            <div class="input">
                                <label for="length">Tour length</label>
                                <input type="text" id="t_length" class="rounded w-4" name="length">
                            </div>
                            
                            <div class="input">
                                <label for="number">Number</label>
                                <input type="text" id="number" class="rounded w-4" name="number">
                            </div>

                            <div class="input">
                                <label for="supplier">Supplier ID</label>
                                <input type="text" id="supplier" class="rounded w-4" name="supplier">
                            </div>

                            <div class="input">
                                <label for="from">From</label>
                                <input type="text" id="from" class="rounded w-4" name="from">
                            </div>

                            <div class="input">
                                <label for="to">To</label>
                                <input type="text" id="to" class="rounded w-4" name="to">
                            </div>
                            
                            <div class="input w-4">
                                <label for="" class="">Images</label>
                                <label for="images" class="custom-file-upload readonly btn button--green w-50 d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    Choose File
                                </label>
                                <input type="file" name="images[]" id="images" accept="image/*" multiple>
                            </div>
                            
                            <div class="input">
                                <label>Itinerary</label>
                                <textarea name="itinerary" id="itinerary" class="rounded w-8"></textarea>
                            </div>
                            <div class="button-row">
                                <button name="create_tour" type="submit" class="btn button--main border-none rounded">Save</button>
                                <a href="../tours.php" class="btn btn-secondary rounded border-none">Go back</a>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['create_tour'])) {
                            $tour = new Tour();
                            $tour_images = new TourImage();
                            $data = [
                                't_id' => $_POST['t_id'],
                                't_name' => $_POST['t_name'],
                                'price' => $_POST['price'],
                                'transport' => $_POST['transport'],
                                'start' => $_POST['start'],
                                'end' => $_POST['end'],
                                'length' => $_POST['length'],
                                'number' => $_POST['number'],
                                'from' => $_POST['from'],
                                'to' => $_POST['to'],
                                'itinerary' => $_POST['itinerary'],
                                'supplier' => $_POST['supplier'],
                            ];
                            $tour->createNewData($data);

                            $extension = array('jpeg','jpg', 'png', 'gif'); 
                            foreach($_FILES['images']['tmp_name'] as $key => $value) {
                                $fileName = $_FILES['images']['name'][$key];
                                $fileNameTmp = $_FILES['images']['tmp_name'][$key];

                                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                                // $image_data = '';
                                if(in_array($ext, $extension)) {
                                    if(!file_exists('../../tours/img/' .$fileName)) {
                                        move_uploaded_file($fileNameTmp, '../../tours/img/'.$fileName);
                                        $image_data = [
                                            'images' => $fileName,
                                            't_id' => $_POST['t_id']
                                        ];
                                    } else {
                                        $fileName = str_replace('.','-', basename($fileName, $ext));
                                        $newFileName = $fileName.time().".".$ext;
                                        move_uploaded_file($fileNameTmp, '../../tours/img/'.$newFileName);
                                        $image_data = [
                                            'images' => $newFileName,
                                            't_id' => $_POST['t_id']
                                        ];
                                    }
                                    $tour_images->createNewData($image_data);
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="content__body mt-5">
               <a href=""></a> 
            </div>
        </div>
    </div>
    <script src="../../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // detailSubmit('tour');
    </script>
</body>
</html>