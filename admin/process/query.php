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
                where tour_ID = :t_id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }
}

class TourImage extends Connection {
    public function createNewData($image_data) {
        $sql = "INSERT INTO tour_image VALUES('', :images, :t_id)";
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

    public function deleteData($data) {
        $sql = "DELETE FROM tour_image WHERE tour_ID = :t_id";
        $delete = $this->prepareSQL($sql);
        $delete->execute($data);
    }
}

class Customer extends Connection {
    // public function createNewData($data) {
    //     $sql = "INSERT INTO customer VALUES(':id')";
    // }
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
        $sql = "DELETE FROM supplier WHERE supplier_file = :s_file";
    }

}

class Order extends Connection {
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
}

class Invoice extends Connection {
    public function updateData($data) {
        $sql = "UPDATE `invoice` SET
        invoice_status = :check_status,
        invoice_method =:method,
        invoice_note = :note,
        order_ID = :o_id
        WHERE invoice_id = :id";
        $update = $this->prepareSQL($sql);
        $update->execute($data);
    }
}

class Search extends Connection {
    public function tourSearch($search) {
        $sql = "SELECT * FROM tour 
                WHERE tour_ID LIKE :search
                OR tour_name like :search
                OR tour_start like :search
                OR tour_price like :search
                OR tour_number like :search";
        $select = $this->prepareSQL($sql);
        $select->execute([':search' => '%'. $search .'%']);
        return $select->fetchAll();
    }

    public function customerSearch($search) {
        $sql = "SELECT * FROM customer 
                WHERE customer_ID LIKE :search
                OR customer_first_name like :search
                OR customer_last_name like :search
                OR customer_gender like :search
                OR customer_birthday like :search
                OR customer_email like :search
                OR customer_phone like :search";
        $select = $this->prepareSQL($sql);
        $select->execute([':search' => '%'. $search .'%']);
        return $select->fetchAll();
    }

    public function supplierSearch($search) {
        $sql = "SELECT * FROM supplier 
                WHERE supplier_ID LIKE :search
                OR supplier_name like :search
                OR supplier_address like :search
                OR supplier_email like :search
                OR supplier_phone like :search";
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
                OR t.tour_name like :search
                OR c.customer_first_name like :search
                OR c.customer_last_name like :search
                OR c.customer_phone like :search
                OR c.customer_email like :search
                OR o.order_time like :search
                OR i.invoice_status like :search";
        $select = $this->prepareSQL($sql);
        $select->execute([':search' => '%'. $search .'%']);
        return $select->fetchAll();
    }
}
