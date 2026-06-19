<?php
include "index.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cars</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
    <div class="container">
        <div class="main-content">
            <div>
                <h1 class="chapter">user</h1>
                <!-- user -->
                <section class="dashboard">
                    <div class="dhb-head">
                        <h2>Users Management</h2>
                        <a href="#" class="add-btn">add new user</a>
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
                                    <h3>0</h3>
                                    <small>đã tham gia</small>
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="stat-box blue">
                                <span>
                                    <img src="/car-shop/assets/images/icon/thung-rac.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>User delete</p>
                                    <h3>0</h3>
                                    <small>total delete</small>
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
                                    <h3>0</h3>
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
                                <th>Role</th>
                                <th>acvated_at</th>
                                <th>CRUD</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Example user data -->
                            <tr class="item_head">
                                <td><input type="checkbox"></th>
                                <td>1</td>
                                <td>
                                    <div class="user-name">
                                        <img src="/car-shop/assets/images/users/user1.png" alt="">
                                        Nguyen Phong
                                    </div>
                                </td>
                                <td>Nguyen Phong.doe@example.com</td>
                                <td>034567203</td>
                                <td> Hồ Chí Minh</td>
                                <td>
                                    <span class="role user">
                                        Admin
                                    </span>
                                </td>
                                <td> </td>
                                <td>
                                    <div class="crud-icon">
                                        <a href="/car-shop/admin/edit-user.php?id=1" class="edit-btn">
                                            <img src="/car-shop/assets/images/icon/edit-but.png" alt="but" class="btn-imgcru">
                                        </a>
                                        <a href="/car-shop/admin/delete-user.php?id=1" class="delete-btn">
                                            <img src="/car-shop/assets/images/icon/thung-rac.png" alt="but" class="btn-imgcru">
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="item_head">
                                <td><input type="checkbox"></td>
                                <td>2</td>
                                <td>
                                    <div class="user-name">
                                        <img src="/car-shop/assets/images/users/user2.png" alt="">
                                        jony Nguyen
                                    </div>
                                </td>
                                <td>john.doe@example.com</td>
                                <td>034567203</td>
                                <td>Tp. Hồ Chí Minh</td>
                                <td><span class="role user">User</span></td>
                                <td>12/05/2025</td>
                                <td>
                                    <div class="crud-icon">
                                        <a href="/car-shop/admin/edit-user.php?id=1" class="edit-btn">
                                            <img src="/car-shop/assets/images/icon/edit-but.png" alt="but" class="btn-imgcru">
                                        </a>
                                        <a href="/car-shop/admin/delete-user.php?id=1" class="delete-btn">
                                            <img src="/car-shop/assets/images/icon/thung-rac.png" alt="but" class="btn-imgcru">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </section>
        </div>
    </div>

</body>

</html>