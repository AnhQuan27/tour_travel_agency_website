<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/main.js"></script>
</body>
</html>
<?php
    require_once './query.php';
    // $check = new Login();
    // $check->checkLogin();
    // if($_SESSION['user_role'] > 2 ){
    //     header('Location:../imEx.php');
    // } else {

    // }
    
    $login = new Login();
    $login->checkAdminLogin();

    if($_GET['from'] == 'tours') {
        $tour = new Tour();
        $tour_image = new TourImage();
        $data = [
            'id' => $_GET['t_id'],
        ];
        try {
            $tour_image->deleteData($data);
            $tour->deleteData($data);
            // echo '<script>alert("Tour deleted successfully!");';
            echo '<script>deleteSuccess("Tour","../tours.php");</script>';
            // echo 'window.location.href="../tours.php";</>';
        } catch (PDOException $e) {
            echo $e;
            if($e->getCode() == 23000) {
                // echo '<script>alert("Cannot delete the tour. There are related orders. Please delete the orders first!");';
                echo '<script>swalError("Cannot delete the tour. There are related orders. Please delete the orders first!","../tours.php");</script>';
                // echo 'window.location.href="../tours.php";</>';
                exit();
            }
        }
        exit;
    }

    if($_GET['from'] == 'customers') {
        $customer = new Customer();

        $data = [
            'id' => $_GET['id'],
        ];

        try {
            $customer->deleteData($data);
            echo '<script>deleteSuccess("Customer","../customers.php");</script>';
        }
        catch (PDOException $e) {
            if($e->getCode() == 23000) {
                echo '<script>swalError("Cannot delete the customer. There are related orders. Please delete the orders first!","../customers.php");</script>';
                exit();
            }
        }
    }

    if ($_GET['from'] == 'suppliers') {
        $supplier = new Supplier();
        $data = [
            'id' => $_GET['id']
        ];
        try {
            $supplier->deleteData($data);
            echo '<script>deleteSuccess("Supplier","../suppliers.php");</script>';
        } catch (PDOException $e) {
            if($e->getCode() == 23000) {
                echo '<script>swalError("Cannot delete the supplier. There are related tours. Please delete the tours first!","../suppliers.php");</script>';
                exit();
            }
        }
    }
    
    if ($_GET['from'] == 'orders') {
        $order = new Order();
        $invoice = new Invoice();
        $data = [
            'id' => $_GET['id'],
        ];
        try {
            $invoice->deleteDataWhereOrderID($data);
            $order->deleteData($data);
            echo '<script>deleteSuccess("Order","../orders.php");</script>';
        } catch (PDOException $e) {
            // if($e->getCode() == 23000) {
                echo $e;
            // }
        }
    }
    