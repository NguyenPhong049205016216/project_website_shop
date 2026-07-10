<?php
require_once  __DIR__ . "/../../config/database.php";

$id = intval($_GET['id']);
$sql = "SELECT * FROM `user` WHERE id = $id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
if (isset($_POST['update_user'])) {
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
    header("Location: ../users.php");
    exit();
}
?>
<?php include "../index.php"; ?>
<head>
    <link rel="stylesheet" href="/car-shop/assets/css/ad-edit-user.css">
</head>
<body>
    <div class="container">
        <main class="main-content">
            <h1 class="chapter">Edit User</h1>
            <form class="form-card" method="POST">
                <h2>Update User Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo $user['name']; ?>" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="<?php echo $user['phone']; ?>" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo $user['address']; ?>" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role">
                            <option value="user" <?php if ($user['role'] == "user") echo "selected"; ?>>User</option>
                            <option value="admin" <?php if ($user['role'] == "admin") echo "selected"; ?>>Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status">
                            <option value="active" <?php if ($user['status'] == "active") echo "selected"; ?>>Active</option>
                            <option value="inactive" <?php if ($user['status'] == "inactive") echo "selected"; ?>>blocket</option>
                        </select>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="../users.php" class="back-btn">Cancel</a>
                    <button type="submit" name="update_user" class="save-btn">Update User</button>
                </div>
            </form>
        </main>
    </div>
</body>