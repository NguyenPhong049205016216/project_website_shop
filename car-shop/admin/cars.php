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
            <a href="/car-shop/admin/dashboard.php">Dashboard</a>
            <a href="/car-shop/admin/cars.php">Cars</a>
            <a href="/car-shop/admin/users.php">Users</a>
            <a href="/car-shop/admin/brands.php">Categories</a>
            <a href="/car-shop/admin/orders.php">Orders</a>
            <a class="btn" href="/car-shop/index.php">Logout</a>
        </left>

        <main class="main-content">
            <h1 class="chapter">Cars</h1>
            <div class="dashboard">
                <h2>Cars Management</h2>
                <p>Here you can manage cars, view their details, and perform actions such as edit or delete.</p>
                <div class="search">
                    <from>
                        <input type="text" id="search" placeholder="Search cars...">
                    </from>
                    <div class="infomation">
                    <img src="/car-shop/assets/images/cars/toyota_3.png" alt="">
                </div>
                </div>
                <div class="infomation_car">
                    <h2>Total cars in shop</h2>
                    <div class="item_tatol">
                        <h1> Số lượng</h1>
                        <p>0</p>
                    </di>
                </div>
                </div>

                <h1 class="chapter">Cars list </h1>
                <div class="dashboard">
                    <div class="view_dashboard">
                        <table border="2" cellspacing="1">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>price</th>
                                <th>brands</th>
                                <th>quanity</th>
                                <th>status</th>
                                <th>CRUD</th>
                            </tr>
                            <!-- Example user data -->
                            <tr class="item_head">
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="/car-shop/admin/edit-user.php?id=1">Edit</a>
                                    <a href="/car-shop/admin/delete-user.php?id=1"
                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                </td>
                            </tr>

                            <tr class="item_head">
                                <td>2</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="/car-shop/admin/edit-user.php?id=1">Edit</a>
                                    <a href="/car-shop/admin/delete-user.php?id=1"
                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
        </main>

    </div>




</body>

</html>