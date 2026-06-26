<?php
require_once  __DIR__. "/../../config/database.php";

$id = intval($_GET['id']);

$sql = "SELECT * FROM `user` WHERE id = $id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
if(isset($_POST['update_user'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $update = "UPDATE `user`
               SET name='$name',
                   email='$email',
                   phone='$phone',
                   address='$address',
                   role='$role',
                   status='$status'
               WHERE id=$id";

    mysqli_query($conn, $update);
    header("Location: users.php");
    exit();
}
?>

<form method="POST">
    <h2>Edit User</h2>
    <input type="text" name="name" value="<?php echo $user['name']; ?>" placeholder="Name">
    <input type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email">
    <input type="text" name="phone" value="<?php echo $user['phone']; ?>" placeholder="Phone">
    <input type="text" name="address" value="<?php echo $user['address']; ?>" placeholder="Address">
    <select name="role">
        <option value="user" <?php if($user['role']=="user") echo "selected"; ?>>User</option>
        <option value="admin" <?php if($user['role']=="admin") echo "selected"; ?>>Admin</option>
    </select>
    <select name="status">
        <option value="active" <?php if($user['status']=="active") echo "selected"; ?>>Active</option>
        <option value="inactive" <?php if($user['status']=="inactive") echo "selected"; ?>>Inactive</option>
    </select>
    <button type="submit" name="update_user">Update User</button>
</form>