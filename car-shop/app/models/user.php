<?php
class User{
    private $conn;
    public function __construct($conn)
    {
        $this -> conn = $conn;
    }
    public function __getAll($conn)
    {
        $sql = "SELECT * FROM user ORDER BY id DESC";
        return mysqli_query($this -> conn, $sql);
    }
    public function create($data){
        $sql = "INSERT INTO user
        (name,email,password,phone,address,role)
        VALUES
        ('{$data['name']}',
         '{$data['email']}',
         '{$data['password']}',
         '{$data['phone']}',
         '{$data['address']}',
         '{$data['role']}')";
        return mysqli_query($this->conn,$sql);
    }

    public function delete($id){
        $sql = "DELETE * FROM WHERE id=$id";
        return mysqli_query($this -> conn, $sql);
    }
}