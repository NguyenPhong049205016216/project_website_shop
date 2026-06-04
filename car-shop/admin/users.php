<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Users</title>
    <link rel="stylesheet" href="/car-shop/assets/css/admin.css">
</head>

<body>
    <header>
        <h1>Admin</h1>

    </header>
    <div div class="container">

        <left class="sidebar">
            <a href="/car-shop/admin/index.php">Dashboard</a>
            <a href="/car-shop/admin/cars.php">Cars</a>
            <a href="/car-shop/admin/users.php">Users</a>
            <a href="/car-shop/admin/brands.php">Categories</a>
            <a href="/car-shop/admin/orders.php">Orders</a>
            <a class="btn" href="/car-shop/user/index.php">Logout</a>
        </left>

        <main class="main-content">
            <h1 class="chapter">Dashboard</h1>
            <div class="dashboard">
                <h2>Users Management</h2>
                <p>Here you can manage users, view their details, and perform actions such as edit or delete.</p>
                <div class="search">
                    <from>
                        <input type="text" id="search" placeholder="Search users...">
                    </from>
                </div>
                <h2>Thống kê system</h2>
                <div class="statistics">
                    <div class="statistic-item">
                        <h3>Total Users</h3>
                        <p>150</p>
                    </div>
                    <div class="statistic-item">
                        <h3>Active Users</h3>
                        <p>120</p>
                    </div>
                    <div class="statistic-item">
                        <h3>Admins</h3>
                        <p>5</p>
                    </div>
                </div>
            </div>

            <h1 class="chapter">User</h1>
            <div class="dashboard">
                <div class="view_dashboard">
                    <table>
                        <thead class="table_head">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example user data -->
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john.doe@example.com</td>
                                <td>User</td>
                                <td>
                                    <a href="/car-shop/admin/edit-user.php?id=1">Edit</a>
                                    <a href="/car-shop/admin/delete-user.php?id=1" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

    </div>




</body>

</html>