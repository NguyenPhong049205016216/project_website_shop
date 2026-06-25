<?php
class Cars{

    private $conn;
    public function __construct($conn)
    {
        $this -> conn = $conn;
        
    }
    public function __getAll(){
        $sql = "SELECT cars.*, brands.brand_name
        FROM cars
        JOIN brands ON cars.brand_id = brands.id";
        return mysqli_query($this -> conn, $sql);
    }

    public function create($data) {
        $sql = "INSERT INTO cars
        (brand_id,categories_id,cars_name,price,fuel_type,transmission,engine,color,quantity,description,main_image,status,year)
        VALUES
        ('{$data['brand_id']}',
         '{$data['cata']}',
         '{$data['cars_name']}',
         '{$data['price']}',
         '{$data['puel_type']}',
         '{$data['transmission']}',
         '{$data['engine']}',
         '{$data['color']}',
         '{$data['quantity']}',
         '{$data['description']}',
         '{$data['main_image']}',
         '{$data['status']}',
         '{$data['year']}')";
         return mysqli_query($this->conn, $sql);
    }
    public function delete($id){
        $sql = "DELETE * FROM WHERE id=$id";
        return mysqli_query($this -> conn, $sql);
    }

}
?>