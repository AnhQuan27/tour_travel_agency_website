<?php
require_once '../process/query.php';
$tour = new Tour();
$tour_image = new TourImage();
$data = [
    't_id' => $_GET['t_id']
];
$value = $tour->getEachData($data)['0'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $value['tour_name']?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                    <a href="../tours.html" class="nav-link active">
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
                          <li class="breadcrumb-item"><a href="../tours.html">Tours list</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Tour: <?php echo $value['tour_name']?></li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="detail flex-column d-flex align-items-center">
                    <form method="post" enctype="multipart/form-data" class="d-flex flex-wrap justify-content-between">
                            <div class="input">
                                <label for="t_name" >Tour name</label>
                                <input type="text" id="t_name" class="rounded w-8" name="t_name" value="<?php echo $value['tour_name']?>">
                            </div>
                            
                            <div class="input">
                                <label for="t_id" class="readonly">Tour ID</label>
                                <input type="text" readonly id="t_id" class="rounded w-4" name="t_id" value="<?php echo $value['tour_ID']?>">
                            </div>
                            
                            <div class="input">
                                <label for="price">Price</label>
                                <input type="text" id="price" class="rounded w-4" name="price" value="<?php echo $value['tour_price']?>">
                            </div>

                            <div class="input">
                                <label for="transport">Transport</label>
                                <input type="text" id="transport" class="rounded w-4" name="transport" value="<?php echo $value['tour_transport']?>">
                            </div>
                            
                            <div class="input">
                                <label for="start">Start</label>
                                <input type="date" id="start" class="rounded w-4" name="d_start" value="<?php echo $value['tour_start']?>">
                            </div>
                            
                            <div class="input">
                                <label for="end">End</label>
                                <input type="date" id="end" class="rounded w-4" name="d_end" value="<?php echo $value['tour_end']?>">
                            </div>

                            <div class="input">
                                <label for="t_length">Tour length</label>
                                <input type="text" id="t_length" class="rounded w-4" name="t_length" value="<?php echo $value['tour_length']?>">
                            </div>
                            
                            <div class="input">
                                <label for="number">Number</label>
                                <input type="text" id="number" class="rounded w-4" name="number" value="<?php echo $value['tour_number']?>">
                            </div>
                            
                            <div class="input">
                                <label for="supplier">Supplier ID</label>
                                <input type="text" id="supplier" class="rounded w-4" name="supplier" value="<?php echo $value['supplier_ID']?>">
                            </div>

                            <div class="input">
                                <label for="from">From</label>
                                <input type="text" id="from" class="rounded w-4" name="from" value="<?php echo $value['tour_from']?>">
                            </div>

                            <div class="input">
                                <label for="to">To</label>
                                <input type="text" id="to" class="rounded w-4" name="to" value="<?php echo $value['tour_to']?>">
                            </div>
                            
                            <div class="input w-4">
                                <label for="" class="">Images</label>
                                <label for="images" class="custom-file-upload readonly btn button--green w-50 d-flex align-items-center justify-content-center gap-3">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    Choose File
                                </label>
                                <input type="file" name="images[]" id="images" accept="image/*" multiple>
                            </div>

                            <div class="view-images rounded border-2 p-4 border w-8">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <?php 
                                        $id = $_GET['t_id'];
                                        $tour_images = $tour_image->getData($id);
                                        foreach($tour_images as $tour_image):
                                        ?>
                                        <div class="swiper-slide">
                                            <img class="" src="../../tours/img/<?php echo $tour_image['image_name'] ?>" alt="">
                                        </div>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>

                            <div class="input">
                                <label>Itinerary</label>
                                <textarea name="itinerary" id="itinerary" class="rounded w-8"><?php echo $value['tour_number']?></textarea>
                            </div>
                            <div class="button-row">
                                <button class="btn button--main border-none rounded" name="submit">Save</button>
                                <a href="../tours.php" class="btn btn-secondary rounded border-none">Go back</a>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit'])){
                            $tour = new Tour();
                            $tour_image = new TourImage();
                            $data = [
                                't_id' => $_GET['t_id'],
                                't_name' => $_POST['t_name'],
                                'price' => $_POST['price'],
                                'transport' => $_POST['transport'],
                                'd_start' => $_POST['d_start'],
                                'd_end' => $_POST['d_end'],
                                't_length' => $_POST['t_length'],
                                'tour_number' => $_POST['number'],
                                'from_location' => $_POST['from'],
                                'to_location' => $_POST['to'],
                                'itinerary' => $_POST['itinerary'],
                                'supplier' => $_POST['supplier'],
                            ];
                            $tour->updateData($data);

                            if(isset($_FILES['images'])) {
                                $image_id = [
                                    't_id' => $_GET['t_id'],
                                ];
                                $tour_image->deleteData($image_id);
                            }
                            
                            $extension = array('jpeg','jpg', 'png', 'gif'); 
                            foreach($_FILES['images']['tmp_name'] as $key => $value) {
                            $fileName = $_FILES['images']['name'][$key];
                            $fileNameTmp = $_FILES['images']['tmp_name'][$key];
                            
                            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                            $image_data = '';
                                if(in_array($ext, $extension)) {
                                    if(!file_exists('../../tours/img/' .$fileName)) {
                                        move_uploaded_file($fileNameTmp, '../../tours/img/'.$fileName);
                                        $image_data = [
                                            'images' => $fileName,
                                            't_id' => $_GET['t_id']
                                        ];
                                    } else {
                                        $fileName = str_replace('.','-', basename($fileName, $ext));
                                        $newFileName = $fileName.time().".".$ext;
                                        move_uploaded_file($fileNameTmp, '../../tours/img/'.$newFileName);
                                        $image_data = [
                                            'images' => $newFileName,
                                            't_id' => $_GET['t_id']
                                        ];
                                    }
                                    $tour_image->createNewData($image_data);
                                }
                            }
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        swiperPagination();
        // detailSubmit('tour');
    </script>
</body>
</html>