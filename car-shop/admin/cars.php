<?php
include "index.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Users</title>
    <link rel="stylesheet" href="/car-shop/assets/css/admin.css">
</head>

<body>
    <div class="container">
        <main class="main-content">
            <div>
                <!-- Cars -->
                <h1 class="chapter">Cars</h1>
                <section class="dashboard">
                    <div class="dhb-dead">
                        <h2>Cars Management</h2>
                        <p>Here you can manage cars, view their details, and perform actions such as edit or delete.</p>
                        <a href="#" class="add-btn">add new user</a>
                    </div>

                    <div class="toolbar">
                        <input type="text" placeholder="search cars...">

                        <select>
                            <option>catagory: all</option>
                            <option> Sedan </option>
                            <option> Suv </option>
                            <option> Pickup </option>
                        </select>

                        <select>
                            <option> status: all</option>
                            <option> Active </option>
                            <option> Out of stock</option>
                        </select>
                    </div>

                    <div class="dhb-toof">
                        <div class="stats">
                            <div class="stat-box green">
                                <span>
                                    <img src="/car-shop/assets/images/icon/loai-xe.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>tổng xe</p>
                                    <h3>0</h3>
                                    <small>tất cả xe trong hệ thống</small>
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="stat-box yellow">
                                <span>
                                    <img src="/car-shop/assets/images/icon/icon-tickxanh.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>xe có sẳn</p>
                                    <h3>0</h3>
                                    <small>có sẳn để bán</small>
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="stat-box blue">
                                <span>
                                    <img src="/car-shop/assets/images/icon/icon-hethang.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>hết hàng</p>
                                    <h3>0</h3>
                                    <small>không còn sẳn</small>
                                </div>
                            </div>
                        </div>

                        <div class="stats">
                            <div class="stat-box purple">
                                <span>
                                    <img src="/car-shop/assets/images/icon/icon-danhmuc.png" class="icon-stats">
                                </span>
                                <div>
                                    <p>danh mục</p>
                                    <h3>0</h3>
                                    <small>loại danh mục</small>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
            </div>

            <h1 class="chapter">Cars list </h1>
            <div class="dashboard">
                <div class="table-title">
                </div>
                <div class="view_dashboard">
                    <table class="user_table" border="2" cellspacing="8">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>price</th>
                                <th>brands</th>
                                <th>quanity</th>
                                <th>status</th>
                                <th>CRUD</th>
                            </tr>
                        </thead>
                        <!-- Example user data -->
                        <tr class="item_head" id="stitle-cars">
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span class="stt-cars">
                                    active
                                </span></td>
                            <td>
                                <div class="crud-icon">
                                    <a href="edit-user.php?id=1" class="edit-btn">
                                        <img src="/car-shop/assets/images/icon/edit-but.png" alt="but" class="btn-imgcru">
                                    </a>
                                    <a href="delete-user.php?id=1" class="delete-btn">
                                        <img src="/car-shop/assets/images/icon/thung-rac.png" alt="but" class="btn-imgcru">
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr class="item_head" id="stitle-cars">
                            <td><input type="checkbox"></th>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span class="stt-cars">
                                    active
                                </span></td>
                            </td>
                            <td>
                                <div class="crud-icon">
                                    <a href="edit-user.php?id=1" class="edit-btn">
                                        <img src="/car-shop/assets/images/icon/edit-but.png" alt="but" class="btn-imgcru">
                                    </a>
                                    <a href="delete-user.php?id=1" class="delete-btn">
                                        <img src="/car-shop/assets/images/icon/thung-rac.png" alt="but" class="btn-imgcru">
                                    </a>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </main>

    </div>

</body>

</html>