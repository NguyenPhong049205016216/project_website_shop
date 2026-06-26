<?php
class Cars{
    private $conn;
    public function __construct($conn)
    {
        $this -> conn = $conn;
    }
    public function getAll(){
        $sql = "SELECT cars.*, brands.brand_name
        FROM cars
        JOIN brands ON cars.brand_id = brands.id
        ORDER BY cars.id DESC";
        return mysqli_query($this -> conn, $sql);
    }
    public function create($data) {
        $sql ="INSERT INTO cars
        (brand_id,categories_id,cars_name,price,fuel_type,transmission,engine,color,quantity,description,main_image,status,year)
        VALUES
        ('{$data['brand_id']}',
         '{$data['categories_id']}',
         '{$data['cars_name']}',
         '{$data['price']}',
         '{$data['fuel_type']}',
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
        $sql = "DELETE FROM cars WHERE id=$id";
        return mysqli_query($this -> conn, $sql);
    }
}
?>