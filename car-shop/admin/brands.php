<?php
include "index.php";
?>

<body>
    <div div class="container">
        <main class="main-content">

            <h1 class="chapter">user</h1>
            <!-- user -->
            <div class="dashboard">
                <h2>Users Management</h2>
                <p>Here you can manage users, view their details, and perform actions such as edit or delete.</p>
                <div class="search">
                    <from>
                        <input type="text" id="search" placeholder="Search users...">
                    </from>
                </div>
                <h2>Thống kê system</h2>
            </div>

            <h1 class="chapter">User list </h1>
            <div class="dashboard">
                <div class="view_dashboard">
                    <table  class="user_table" border="1" cellspacing="0">
                        <tr class="item_head">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>address</th>
                            <th>Role</th>
                            <th>acvated_at</th>
                        </tr>
                        <!-- Example user data -->
                        <tr class="item_head">
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>034567203</td>
                            <td>Tp. Hồ Chí Minh</td>
                            <td>User</td>
                            <td>
                                <a href="/car-shop/admin/edit-user.php?id=1">Edit</a>
                                <a href="/car-shop/admin/delete-user.php?id=1" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
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