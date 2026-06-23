<?php 
require __DIR__. "/../../config/database.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO user 
            (name, email, password, phone, address, role)
            VALUES
            ('$name', '$email', '$password', '$phone', '$address', '$role')";
            
    if (mysqli_query($conn, $sql)) {
        // cho nó quay về file user hiện thông tin.
        header("Location: ../users.php");
        exit;
    } else {
        echo mysqli_error($conn);
    }
}
?>

<form  method="POST">
    <input type="text" name="name" placeholder="nhập tên người dùng">
    <input type="email" name="email"  placeholder="nhập email">
    <input type="text" name="phone" placeholder="nhập số điện thoại">
    <input type="text" name="address" placeholder="nhập địa chỉ">
    <input type="text" name="password" placeholder="nhập mật khẩu">
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
    <button type="submit" name="submit">Thêm user</button>
    

</form>
