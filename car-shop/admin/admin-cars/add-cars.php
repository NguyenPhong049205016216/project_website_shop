<?php
require __DIR__ . "/../../config/database.php";

if (isset($_POST['submit'])) {

    $brand_id = $_POST['brand_id'];
    $categories_id = $_POST['categories_id'];
    $cars_name = $_POST['cars_name'];
    $price = $_POST['price'];
    $fuel_type = $_POST['fuel_type'];
    $transmission = $_POST['transmission'];
    $engine = $_POST['engine'];
    $color = $_POST['color'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $main_image = $_POST['main_image'];
    $status = $_POST['status'];
    $year = $_POST['year'];

    $sql = "INSERT INTO cars
            (brand_id, categories_id, cars_name, price, fuel_type, transmission, engine, color, quantity, description, main_image, status, year)
            VALUES
            ('$brand_id', '$categories_id', '$cars_name', '$price', '$fuel_type', '$transmission', '$engine', '$color', '$quantity', '$description', '$main_image', '$status', '$year')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../cars.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}
?>

<h2>Add New Car</h2>

<form method="POST">

    <input type="number" name="brand_id" placeholder="thương hiệu">

    <input type="number" name="categories_id" placeholder="loại xe">

    <input type="text" name="cars_name" placeholder="tên xe">

    <input type="number" name="price" placeholder="thêm Giá">

    <input type="text" name="fuel_type" placeholder="nhiên liệu">

    <input type="text" name="transmission" placeholder="số sàng">

    <input type="text" name="engine" placeholder="động cơ">

    <input type="text" name="color" placeholder="màu">

    <input type="number" name="quantity" placeholder="số lượng">

    <textarea name="description" placeholder="Description"></textarea>

    <input type="text" name="main_image" placeholder="Image path">

    <select name="status">
        <option value="available">Available</option>
        <option value="sold">Sold</option>
        <option value="hidden">Hidden</option>
    </select>

    <input type="number" name="year" placeholder="Year">

    <button type="submit" name="submit">
        Add Car
    </button>

</form>