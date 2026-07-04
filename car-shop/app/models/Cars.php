<?php
class Cars
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getAll()
    {
        $sql = "SELECT cars.*, brands.brand_name
        FROM cars
        JOIN brands ON cars.brand_id = brands.id
        ORDER BY cars.id DESC";
        return mysqli_query($this->conn, $sql);
    }
    public function getById($id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM cars WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function update($id, $data){
    $id = intval($id);

    $sql = "UPDATE cars SET
            brand_id = '{$data['brand_id']}',
            categories_id = '{$data['categories_id']}',
            cars_name = '{$data['cars_name']}',
            price = '{$data['price']}',
            fuel_type = '{$data['fuel_type']}',
            transmission = '{$data['transmission']}',
            engine = '{$data['engine']}',
            color = '{$data['color']}',
            quantity = '{$data['quantity']}',
            description = '{$data['description']}',
            main_image = '{$data['main_image']}',
            status = '{$data['status']}',
            year = '{$data['year']}'
            WHERE id = $id";

    return mysqli_query($this->conn, $sql);
}
    public function create($data)
    {
        $sql = "INSERT INTO cars
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
    public function delete($id)
    {
        $sql = "DELETE FROM cars WHERE id=$id";
        return mysqli_query($this->conn, $sql);
    }
}
