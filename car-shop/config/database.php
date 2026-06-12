<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "car_shop";

$conn = mysqli_connect($host, $username, $password, $database);

if($conn){

    echo "Kết nối thành công";

}else{

    echo "Kết nối thất bại";
    
}
?>