<?php
require_once '../admin/process/query.php';


$search = '';
if(isset($_GET['search'])) {
    $search = $_GET['search'];

    $searching = new Search();

    $suppliers = $searching->supplierSearch($search);
} else {
    $supplier = new Supplier();
    $suppliers = $supplier->getData();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
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
                    <a href="./tours.html" class="nav-link">
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
                    <a href="./suppliers.html" class="nav-link active">
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
                <h1 class="heading-title mb-3">Suppliers list</h1>
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
                            <input class="rounded" value="<?php echo $search?>" type="search" name="search" id="search" placeholder="Search..." >
                        </div>
                    </form>
                </div>
            </div>
            <div class="content__body mt-5">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th >Supplier name</th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($suppliers as $supplier): ?>
                    <tr>
                        <td><?php echo $supplier['supplier_ID']?></td>
                        <td><?php echo $supplier['supplier_name']?></td>
                        <td><?php echo $supplier['supplier_address']?></td>
                        <td><?php echo $supplier['supplier_phone']?></td>
                        <td><?php echo $supplier['supplier_email']?></td>
                        <td>
                            <div class="d-flex justify-content-evenly">
                                <a href="./suppliers/supplier.php?id=<?php echo $supplier['supplier_ID']?>">
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
        // deleteConfirm('Supplier');
    </script>
</body>
</html>