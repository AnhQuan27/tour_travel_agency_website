<?php 
abstract class Connection {
    protected $connection,
    $host,
    $dbname,
    $username,
    $password;
    public function __construct() {
        $this->host = 'localhost';
        $this->dbname = 'tour_travel_agency';
        $this->username = 'root';
        $this->password = '';
        $this->connection = $this->connect();
    }
    public function connect() {
        try {
            $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username, $this->password);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $connection;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }   
    public function prepareSQL($sql) {
        return $this->connection->prepare($sql);
    }
}

class Tour extends Connection {
    public function createNewData($data) {
        $sql = "INSERT INTO tour VALUES(:t_id, :t_name, :price, :transport, :start, :end, :length, :number, :from, :to, :itinerary, :supplier)";
        $create = $this->prepareSQL($sql);
        $create->execute($data);
    }

    public function getData() {
        $sql = "SELECT * FROM tour";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function getEachData($data) {
        $sql = "SELECT * FROM tour WHERE tour_ID = :t_id";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    public function updateData($data) {
        $sql = "UPDATE tour SET 
                tour_name = :t_name,
                tour_price = :price,
                tour_transport = :transport,
                tour_start = :d_start,
                tour_end = :d_end,
                tour_length = :t_length,
                tour_number = :tour_number,
                tour_from = :from_location,
                tour_to = :to_location,
                tour_itinerary = :itinerary,
                supplier_ID = :supplier
                WHERE tour_ID = :t_id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }

    public function deleteData($data) {
        $sql = "DELETE FROM tour WHERE tour_ID = :id";
        $delete = $this->prepareSQL($sql);
        $delete->execute($data);
    }
}

class TourImage extends Connection {
    public function createNewData($image_data) {
        $sql = "INSERT INTO tour_image VALUES('', :images, :id)";
        $create = $this->prepareSQL($sql);
        $create->execute($image_data);
    }

    // public function updateData($image_data) {
    //     $sql = "UPDATE tour_image SET
    //             image_name = :images
    //             where tour_ID = :t_id";
    //     $update = $this->prepareSQL($sql);
    //     $update->execute($image_data);
    // }

    public function getData($id) {
        $sql = "SELECT * FROM tour_image WHERE tour_ID = $id";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function getDataLimit($id) {
        $sql = "SELECT * FROM tour_image WHERE tour_ID = $id LIMIT 1";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function deleteData($data) {
        $sql = "DELETE FROM tour_image WHERE tour_ID = :id";
        $delete = $this->prepareSQL($sql);
        $delete->execute($data);
    }

    public function getDataWhereTourID($data) {
        $sql = "SELECT * FROM tour t
                JOIN supplier s ON s.supplier_ID = t.supplier_ID
                JOIN tour_image tm ON tm.tour_ID = t.tour_ID
                JOIN `order` o ON o.tour_ID = t.tour_ID";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }
}

class Customer extends Connection {
    public function createData($data) {
        $sql = "INSERT INTO customer VALUES(:id, :f_name, :l_name, '', '', :phone, :email, :address, :a_id)";
        $insert = $this->prepareSQL($sql);
        $insert->execute($data);
    } 
    
    public function getData() {
        $sql = "SELECT * FROM customer";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
    
    public function getEachData($data) {
        $sql = "SELECT * FROM customer WHERE customer_ID = :id";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    public function updateData($data) {
        $sql = "UPDATE customer SET
                customer_first_name = :f_name,
                customer_last_name = :l_name,
                customer_gender = :gender,
                customer_birthday = :birthday,
                customer_phone = :phone,
                customer_email = :email,
                customer_address = :c_address,
                account_ID = :a_id
                WHERE customer_id = :id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }

    public function deleteData($data) {
        $sql = "DELETE FROM customer WHERE customer_ID = :id";
        $delete = $this->prepareSQL($sql);
        $delete->execute($data);
    }
}

class Supplier extends Connection {
    public function getData() {
        $sql = "SELECT * FROM supplier";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function getEachData($data) {
        $sql = "SELECT * FROM supplier WHERE supplier_ID = :id";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    // public function getDataJoinTourSupplierOrderImage($data) {
    //     $sql = "SELECT * FROM tour t
    //             JOIN supplier s ON s.supplier_ID = t.supplier_ID
    //             JOIN tour_image tm ON tm.tour_ID = t.tour_ID
    //             JOIN `order` o ON o.tour_ID = t.tour_ID";
    //     $select = $this->prepareSQL($sql);
    //     $select->execute();
    //     return $select->fetchAll();
    // }

    public function updateData($data) {
        $sql = "UPDATE supplier SET
                supplier_name = :s_name,
                supplier_phone = :phone,
                supplier_email = :email,
                supplier_address = :c_address,
                supplier_note = :note,
                supplier_file = :s_file
                WHERE supplier_id = :id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }

    public function deleteData($data) {
        $sql = "DELETE FROM supplier WHERE supplier_ID = :id";
        $delete = $this->prepareSQL($sql);
        $delete->execute($data);
    }
}

class Order extends Connection {

    public function createData($data) {
        $sql = "INSERT INTO `order` VALUES(:id, :number, :time, :phone, :email, :note, :t_id, :c_id)";
        $insert = $this->prepareSQL($sql);
        $insert->execute($data);
    }

    public function getData() {
        $sql = "SELECT * FROM `order` o
                JOIN tour t ON t.tour_ID = o.tour_ID
                JOIN invoice i ON i.order_ID = o.order_ID
                JOIN customer c ON c.customer_ID = o.customer_ID";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function getEachData($data) {
        $sql = "SELECT * FROM `order` o
                JOIN tour t ON t.tour_ID = o.tour_ID
                JOIN invoice i ON i.order_ID = o.order_ID
                JOIN customer c ON c.customer_ID = o.customer_ID
                WHERE o.order_ID = :o_id";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    public function getDataWhereCustomerID($data) {
        $sql = "SELECT * FROM `order` o
                JOIN tour t ON t.tour_ID = o.tour_ID
                JOIN invoice i ON i.order_ID = o.order_ID
                JOIN customer c ON c.customer_ID = o.customer_ID
                WHERE c.customer_ID = :id";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    public function getEachDataWhereInvoiceID($data) {
        $sql = "SELECT * FROM `order` o
                JOIN tour t ON t.tour_ID = o.tour_ID
                JOIN invoice i ON i.order_ID = o.order_ID
                JOIN customer c ON c.customer_ID = o.customer_ID
                WHERE i.invoice_ID = :i_id";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    public function updateData($data) {
        $sql = "UPDATE `order` SET
                order_time = :o_time,
                order_phone = :phone,
                order_email = :email,
                order_number = :o_number,
                order_note = :note
                WHERE order_ID = :id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }

    public function deleteData($data) {
        $sql = "DELETE FROM `order` WHERE order_ID = :id";
        $delete = $this->prepareSQL($sql);
        $delete->execute($data);
    }

    public function deleteDataWhereCustomerID($data) {
        $sql = "DELETE FROM `order` WHERE customer_ID = :id";
        $delete = $this->prepareSQL($sql);
        $delete->execute($data);
    }
}

class Invoice extends Connection {

    public function createData($data){
        $sql = "INSERT INTO invoice VALUES(:id, :status, :method, :note, :invoice_img_check, :invoice_img_receive, :o_id)";
        $create = $this->prepareSQL($sql);
        $create->execute($data);
    }

    public function getData() {
        $sql = "SELECT * FROM invoice";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function updateData($data) {
        $sql = "UPDATE `invoice` SET
        invoice_status = :check_status,
        invoice_method =:method,
        invoice_note = :note,
        invoice_img_check = :invoice_img_check,
        order_ID = :o_id
        WHERE invoice_id = :id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }

    public function deleteData($data) {
        $sql = "DELETE FROM invoice WHERE invoice_ID = :id";
        $delete = $this->prepareSQL($sql);
        $delete->execute($data);
    }

    public function deleteDataWhereOrderID($data) {
        $sql = "DELETE FROM invoice WHERE order_ID = :id";
        $delete = $this->prepareSQL($sql);
        $delete->execute($data);
    }
}

class Account extends Connection {

    public function createData($data) {
        $sql = "INSERT INTO account VALUES(:id, :account, :password, :role)";
        $insert = $this->prepareSQL($sql);
        $insert->execute($data);
    }
    public function getDataJoinCustomer() {
        $sql = "SELECT account.account_ID,
                account.account_role AS `role`,
                CONCAT(customer.customer_first_name, ' ', customer.customer_last_name) AS full_name,
                account.account_username AS username,
                customer.customer_phone AS phone,
                customer.customer_email AS email
                FROM account
                INNER JOIN customer ON account.account_ID = customer.account_ID
                ORDER BY `role` ASC";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function getDataJoinSupplier() {
        $sql = "SELECT account.account_ID,
                account.account_role AS `role`,
                supplier.supplier_name AS full_name,
                account.account_username AS username,
                supplier.supplier_phone AS phone,
                supplier.supplier_email AS email
                FROM account
                INNER JOIN supplier ON account.account_ID = supplier.account_ID
                ORDER BY `role` ASC";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function getDataJoinStaff() {
        $sql = "SELECT account.account_ID,
                account.account_role AS `role`,
                CONCAT (staff.staff_first_name, ' ', staff.staff_last_name)AS full_name,
                account.account_username AS username,
                staff.staff_phone AS phone,
                staff.staff_email AS email
                FROM account
                INNER JOIN staff ON account.account_ID = staff.account_ID
                ORDER BY `role` ASC";
        $select = $this->prepareSQL($sql);
        $select->execute();  
        return $select->fetchAll();
    }

    public function getData(){
        $sql = "SELECT * FROM account ORDER BY account_role";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    public function getEachData($data){
        $sql = "SELECT 
                    a.*,
                    s.supplier_name,
                    c.customer_first_name,
                    c.customer_last_name,
                    st.staff_first_name,
                    st.staff_last_name
                FROM account a
                LEFT JOIN supplier s ON a.account_ID = s.account_ID
                LEFT JOIN customer c ON a.account_ID = c.account_ID
                LEFT JOIN staff st ON a.account_ID = st.account_ID
                WHERE a.account_ID = :id";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }
    
    public function getEachDataLeftJoin($data) {
        $sql = "SELECT *
                FROM account a
                LEFT JOIN customer c ON a.account_ID = c.account_ID
                LEFT JOIN staff st ON a.account_ID = st.account_ID
                LEFT JOIN supplier s ON a.account_ID = s.account_ID
                WHERE a.account_ID = :id;";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    public function updateData($data) {
        $sql = "UPDATE account 
                SET account_password = :password,
                account_role = :role
                WHERE account_ID = :a_id";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
    }

    public function deleteData($data) {
        $sql = "DELETE FROM account WHERE account_ID = :id";
        $delete = $this->prepareSQL($sql);
        $delete->execute($data);
    }
}

class Search extends Connection {

    public function accountSearch($search){
        $sql = "SELECT * FROM account a
                JOIN staff st ON st.account_ID = a.account_ID
                JOIN customer c ON c.account_ID = a.account_ID
                JOIN supplier s ON s.account_ID = a.account_ID
                WHERE a.account_ID LIKE :search
                OR a.account_username LIKE :search
                OR c.customer_phone LIKE :search
                OR st.staff_phone LIKE :search
                OR s.supplier_phone LIKE :search
                OR c.customer_email LIKE :search
                OR st.staff_email LIKE :search
                OR s.supplier_email LIKE :search";
        $select = $this->prepareSQL($sql);
        $select->execute([':search' => '%'. $search .'%']);
        return $select->fetchAll();
    }
    public function tourSearch($search) {
        $sql = "SELECT * FROM tour 
                WHERE tour_ID LIKE :search
                OR tour_name LIKE :search
                OR tour_start LIKE :search
                OR tour_price LIKE :search
                OR tour_number LIKE :search";
        $select = $this->prepareSQL($sql);
        $select->execute([':search' => '%'. $search .'%']);
        return $select->fetchAll();
    }

    public function customerSearch($search) {
        $sql = "SELECT * FROM customer 
                WHERE customer_ID LIKE :search
                OR customer_first_name LIKE :search
                OR customer_last_name LIKE :search
                OR customer_gender LIKE :search
                OR customer_birthday LIKE :search
                OR customer_email LIKE :search
                OR customer_phone LIKE :search";
        $select = $this->prepareSQL($sql);
        $select->execute([':search' => '%'. $search .'%']);
        return $select->fetchAll();
    }

    public function supplierSearch($search) {
        $sql = "SELECT * FROM supplier 
                WHERE supplier_ID LIKE :search
                OR supplier_name LIKE :search
                OR supplier_address LIKE :search
                OR supplier_email LIKE :search
                OR supplier_phone LIKE :search";
        $select = $this->prepareSQL($sql);
        $select->execute([':search' => '%'. $search .'%']);
        return $select->fetchAll();
    }

    public function orderSearch($search) {
        $sql = "SELECT * FROM `order` o 
                JOIN tour t ON o.tour_ID = t.tour_ID 
                JOIN invoice i ON i.order_ID = o.order_ID
                JOIN customer c ON c.customer_ID = o.customer_ID
                WHERE o.order_ID LIKE :search
                OR t.tour_name LIKE :search
                OR c.customer_first_name LIKE :search
                OR c.customer_last_name LIKE :search
                OR c.customer_phone LIKE :search
                OR c.customer_email LIKE :search
                OR o.order_time LIKE :search
                OR i.invoice_status LIKE :search";
        $select = $this->prepareSQL($sql);
        $select->execute([':search' => '%'. $search .'%']);
        return $select->fetchAll();
    }
}

class Login extends Connection {
    public function login($data) {
        $sql = "SELECT *, a.account_ID FROM account a
                LEFT JOIN customer c ON a.account_ID = c.account_ID
                LEFT JOIN staff st ON a.account_ID = st.account_ID
                LEFT JOIN supplier s ON a.account_ID = s.account_ID
                WHERE a.account_username = :account_username
                AND a.account_password = :account_password";
        $select = $this->prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    public function checkCustomerLogin() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function checkAdminLogin() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        } 
        if (!isset($_SESSION['account_role']) || $_SESSION['account_role'] > 3) {
            header('location:http://localhost/tour_travel_agency_website/home.php');
        }
    }
}

class View extends Connection {
    public function viewByMonth() {
        $sql = "SELECT
                    YEAR(order_time) AS year,
                    MONTH(order_time) AS month,
                    COUNT(order_ID) AS order_count,
                    SUM(tour_price) AS total_revenue,
                    SUM(order_number) AS total_order_number,
                    COUNT(DISTINCT customer_ID) AS customer_count
                FROM
                    `order`
                JOIN
                    `tour` ON `order`.`tour_ID` = `tour`.`tour_ID`
                GROUP BY
                    YEAR(order_time),
                    MONTH(order_time)
                ORDER BY
                    YEAR(order_time) ASC,
                    MONTH(order_time) ASC;";
        $select = $this->prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }
}