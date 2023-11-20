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
            echo '<script>alert("Tour deleted successfully!");';
            echo 'window.location.href="../tours.php";</script>';
        } catch (PDOException $e) {
            if($e->getCode() == 23000) {
                echo '<script>alert("Cannot delete the tour. There are related orders. Please delete the orders first!");';
                echo 'window.location.href="../tours.php";</script>';
                exit();
            }
        }
        exit;
    }

    if($_GET['from'] == 'customers') {
        $customer = new Customer();
        // $order = new Order();
        // $invoice = new Invoice();
        $data = [
            'id' => $_GET['id'],
        ];

        // $orders = $order->getDataWhereCustomerID($data);
        // foreach($orders as $order) {
        //     $invoice_ID = $order['invoice_ID'];
        //     $invoice->deleteData([
        //         'id' => $invoice_ID
        //     ]);
        // }
        // $order->deleteDataWhereCustomerID($data);
        try {
            $customer->deleteData($data);
            echo '<script>alert("Customer deleted successfully!");';
            echo 'window.location.href="../customers.php";</script>';
        }
        catch (PDOException $e) {
            if($e->getCode() == 23000) {
                echo '<script>alert("Cannot delete the customer. There are related orders. Please delete the orders first!");';
                echo 'window.location.href="../customers.php";</script>';
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
            echo '<script>alert("Supplier deleted successfully!");';
            echo 'window.location.href="../suppliers.php";</script>'; 
        } catch (PDOException $e) {
            if($e->getCode() == 23000) {
                echo '<script>alert("Cannot delete the supplier. There are related tours. Please delete the tours first!");';
                echo 'window.location.href="../suppliers.php";</script>';
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
            echo '<script>alert("Order deleted successfully!");';
            echo 'window.location.href="../orders.php";</script>'; 
        } catch (PDOException $e) {
            // if($e->getCode() == 23000) {
                echo $e;
            // }
        }
    }
    