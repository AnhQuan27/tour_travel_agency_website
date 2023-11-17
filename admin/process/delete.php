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

        $tour_image->deleteData($data);
        $tour->deleteData($data);
        // header('Location:../tours.php');
    }

    if($_GET['from'] == 'customers') {
        $customer = new Customer();
        $order = new Order();
        $invoice = new Invoice();
        $data = [
            'id' => $_GET['id'],
        ];

        $orders = $order->getDataWhereCustomerID($data);
        foreach($orders as $order) {
            $invoice_ID = $order['invoice_ID'];
            $invoice->deleteData([
                'id' => $invoice_ID
            ]);
        }
        $order->deleteDataWhereCustomerID($data);
        $customer->deleteData($data);
        header('Location:../customers.php');
    }

    if ($_GET['from'] == 'suppliers') {
        $supplier = new Supplier();
        $supplier->deleteData($data);

        header('Location:../supplier.php');
    }
    
    if ($_GET['from'] == 'orders') {
        $order = new Order();
        $invoice = new Invoice();
        $data = [
            'id' => $_GET['id'],
        ];
        $invoice->deleteDataWhereOrderID($data);
        $order->deleteData($data);

        header('Location:../orders.php');
    }
    