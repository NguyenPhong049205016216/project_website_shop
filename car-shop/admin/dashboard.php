<?php
include "index.php";
?>

<body>
    <div div class="container">
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
                        <p>0</p>
                    </div>
                    <div class="statistic-item">
                        <h3>Active Users</h3>
                        <p>0</p>
                    </div>
                    <div class="statistic-item">
                        <h3>Admins</h3>
                        <p>0</p>
                    </div>
                    <div class="statistic-item">
                        <h3>Total Orders</h3>
                        <p>0 </p>
                    </div>
                </div>
            </div>

            <h1 class="chapter">Orther news </h1>
            <div class="dashboard">
                <table border="2" cellspacing="1">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>car brands</th>
                        <th>price</th>
                        <th>created_at</th>
                    </tr>
                    <tr>
                        <td>1</th>
                        <td>Customer</th>
                        <td>car brands</th>
                        <td>price</th>
                        <td>created_at</th>
                    </tr>

                </table>

            </div>
        </main>

    </div>




</body>

</html>