<?php
$databasePath = __DIR__ . "/../config/database.php";
if (!file_exists($databasePath)) {
    die("Database configuration file not found: " . htmlspecialchars($databasePath));
}
require_once $databasePath;

if (!isset($conn)) {
    die("Database connection not initialized.");
}
/* lấy tất cả user */
$sql = "SELECT * FROM user ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$totalUsers = mysqli_num_rows($result);

//vô hiệu hóa người dùng
$sqlDisable = "SELECT COUNT(*) AS total_disable FROM `user` WHERE status = 'blocket'";
$resultDisable = mysqli_query($conn, $sqlDisable);
$rowDisable = mysqli_fetch_assoc($resultDisable);
$totalDisable = $rowDisable['total_disable'];

// user edit count placeholder
$sqlEdit = "SELECT COUNT(*) AS total_edit 
            FROM user 
            WHERE updated_at IS NOT NULL";

$resultEdit = mysqli_query($conn, $sqlEdit);

$rowEdit = mysqli_fetch_assoc($resultEdit);

$totalEdit = $rowEdit['total_edit'];

?>
<?php
include "index.php";
?>

<body>
    <div class="container">
        <div class="main-content">
            <div>
                <h1 class="chapter">user</h1>
                <!-- user -->
                <section class="dashboard">
                    <div class="dhb-head">
                        <h2>Users Management</h2>
                        <a href="admin-user/add-user.php" class="add-btn">
                            add new user
                        </a>
                    </div>
                    <div class="toolbar">
                        <input type="text" placeholder="Search user...">
                        <select>
                            <option>Role: all</option>
                            <option>User: all</option>
                            <option>Admin: all</option>
                        </select>
                    </div>

                    <div class="dhb-toof">
                        <div class="stats">
                            <div class="stat-box green">
                                <span>
                                    <img src="/car-shop/assets/images/icon/nguoi-dung.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>total user</p>
                                    <h3>
                                        <?php echo $totalUsers; ?>
                                    </h3>
                                    <small>đã tham gia</small>
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="stat-box blue">
                                <span>
                                    <img src="/car-shop/assets/images/icon/vohieuhoa.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>User disable</p>
                                    <h3><?php echo $totalDisable; ?></h3>
                                    <small>total disable</small>
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="stat-box yellow">
                                <span>
                                    <img src="/car-shop/assets/images/icon/edit-but.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>User edit</p>
                                    <h3><?php echo $totalEdit; ?></h3>
                                    <small>total edit</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

            <h1 class="chapter">User list </h1>
            <section class="dashboard">
                <div class="table-title">
                </div>
                <div class="view_dashboard">
                    <table class="user_table" border="2" cellspacing="8">
                        <thead>
                            <tr class="item_head">
                                <th><input type="checkbox"></th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>address</th>
                                <th>mật khẩu</th>
                                <th>trạng thái</th>
                                <th>Role</th>
                                <th>created at</th>
                                <th>CRUD</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($user = mysqli_fetch_assoc($result)): ?>
                                <tr class="item_head">
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $user['id']; ?></td>
                                    <td>
                                        <div class="user-name">
                                            <img src="/car-shop/assets/images/users/user1.png" alt="">
                                            <?php echo $user['name']; ?>
                                        </div>
                                    </td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['phone']; ?></td>
                                    <td><?php echo $user['address']; ?></td>
                                    <td><?php echo $user['password'] ?></td>
                                    <td>
                                        <?php if ($user['status'] == 'active'): ?>
                                            <span class="status active">Active</span>
                                        <?php else: ?>
                                            <span class="status inactive">blocket</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="role <?php echo htmlspecialchars(strtolower($user['role'] ?? 'user')); ?>">
                                            <?php echo $user['role']; ?>
                                        </span>
                                    </td>
                                    <td><?php echo $user['created_at']; ?></td>
                                    <td>
                                        <div class="crud-icon">
                                            <a href="/car-shop/admin/edit-user.php?id=<?php echo urlencode($user['id']); ?>" class="edit-btn">
                                                <img src="/car-shop/assets/images/icon/edit-but.png" class="btn-imgcru">
                                            </a>

                                            <a href="/car-shop/admin/disable-user.php?id=<?php echo urlencode($user['id']); ?>" class="delete-btn"
                                                onclick="return confirm('Bạn có chắc muốn vô hiệu hóa user này không?')">
                                                <img src="/car-shop/assets/images/icon/vohieuhoa.png" class="btn-imgcru">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

</body>

</html>