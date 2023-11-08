<?php
require_once '../admin/process/query.php';


$search = '';
if(isset($_GET['search'])) {
    $search = $_GET['search'];

    $searching = new Search();

    $tours = $searching->tourSearch($search);
} else {
    $tour = new tour();
    $tours = $tour->getData();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

    <!-- <div class="modal disable">
        <div class="modal__overlay d-flex justify-content-center align-items-center">
            <div class="modal__body">

                <i class="fa-solid fa-xmark" id="close-modal"></i>
                <iframe src="./tours/tour.html" frameborder="0">
                </iframe>
            </div>
        </div>
    </div> -->

    <header class="navbar sticky-top flex-md-nowrap p-0 border-bottom border-2">
        <a href="admin.html" class="navbar-brand px-3 me-0">Travel agency</a>
        <div class="avatar-box d-flex align-items-center">
            <span>User001</span>
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
                
                <li class="nav__item">
                    <a href="./dashboard.html" class="nav-link">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="./tours.html" class="nav-link active">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        <span>Tours</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="./customers.html" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="./suppliers.html" class="nav-link">
                        <i class="fa-solid fa-boxes-packing"></i>
                        <span>Suppliers</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="./orders.html" class="nav-link">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Orders</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="./support.html" class="nav-link">
                        <i class="fa-solid fa-headset"></i>
                        <span>Support Customers</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="./users.html" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="nav__item">
                    <a href="./account.html" class="nav-link">
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
                <h1 class="heading-title mb-3">Tours list</h1>
                <div class="heading-action d-flex justify-content-between align-items-center">
                    <div class="heading__button">
                        <a href="./tours/add.html" class="button button--main rounded border-none me-4">New tour</a>
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
                        </div>
                    </form>
            </div>
            <div class="content__body mt-5">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Start</th>
                        <th>Price</th>
                        <th>Number</th>
                        <th>Action</th>
                    </tr>
                    
                    <?php
                    foreach($tours as $tour):
                    ?>

                    <tr>
                        <td><?php echo $tour['tour_ID'] ?></td>
                        <td><?php echo $tour['tour_name'] ?></td>
                        <td><?php echo $tour['tour_start'] ?></td>
                        <td><?php echo $tour['tour_price'] ?></td>
                        <td><?php echo $tour['tour_number'] ?></td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <a href="./tours/tour.php?t_id=<?php echo $tour['tour_ID']?>">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <i class="fa-solid fa-trash"></i>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    
                </table>
            </div>
        </div>
    </div>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        deleteConfirm('Tour');
    </script>
</body>
</html>