<?php 
class Brands{
    private $conn;
    public function __construct($conn)
    {
        $this -> conn = $conn;
    }
    public function getAll($conn)
    {
        $sql = "SELECT * FROM brands ORDER BY id DESC";
        return mysqli_query($this -> conn, $sql);
    }
    public function create($data) {
        $sql = "INSERT INTO brands
        (brand_name,logo)
        VALUE
        ('{$data['brand_name']}', '{$data['logo']}')";
        return mysqli_query($this -> conn, $sql);
    }
    public function delete($id){
        $sql = "DELETE FROM brands WHERE id=$id";
        return mysqli_query($this -> conn, $sql);
    }


}

?>