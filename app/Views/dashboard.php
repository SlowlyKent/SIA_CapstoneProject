<?php
// Use CodeIgniter's session service (session is already started by framework)
$role = session()->get('role');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FPBG STOCK - Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('dashboard.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color:#051340;
            color: white;
            padding: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #ecf0f1;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar li {
            margin-bottom: 10px;
        }
        .sidebar a {
            color:rgb(255, 255, 255);
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color:#f6416c;
        }
        .logout-btn {
            position: absolute;
            bottom: 20px;
            background-color:#E10600FF;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .welcome-section {
            background: #dcdcde;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .stat-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        .stat-card {
            background: #dcdcde;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .stat-card h3 {
            margin: 0;
            color: #2c3e50;
            font-size: 2em;
        }
        .stat-card p {
            margin: 10px 0 0 0;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <h2>FPBG<br>STOCK</h2>
            <ul>
                <?php if ($role === 'admin'): ?>
                    <li><a href="<?= site_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="<?= site_url('cashiering-admin') ?>"><i class="fas fa-cash-register"></i> Cashiering</a></li>
                    <li><a href="<?= site_url('inventory') ?>"><i class="fas fa-boxes"></i> Inventory</a></li>
                    <li><a href="<?= site_url('stock_in') ?>"><i class="fas fa-arrow-down"></i> Stock In</a></li>
                    <li><a href="<?= site_url('stock_out') ?>"><i class="fas fa-arrow-up"></i> Transactions</a></li>
                    <li><a href="<?= site_url('create') ?>"><i class="fas fa-user-plus"></i> Create User</a></li>
                    <li><a href="<?= site_url('read') ?>"><i class="fas fa-users"></i> View Users</a></li>
                    <li><a href="<?= site_url('check_expiration') ?>"><i class="fas fa-exclamation-triangle"></i> Check Expiration</a></li>
                <?php elseif ($role === 'staff'): ?>
                    <li><a href="<?= site_url('cashiering-staff') ?>"><i class="fas fa-cash-register"></i> Cashiering</a></li>
                <?php endif; ?>
            </ul>
            <a href="<?= site_url('logout') ?>" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>

        <div class="main-content">
            <div class="welcome-section">
                <h1>Welcome to FPBG Stock Management System</h1>
                <p>Hello, <strong><?= session()->get('username') ?></strong>! You are successfully logged in.</p>
                <p>Use the sidebar to navigate through different sections of the system.</p>
            </div>

            <div class="stat-cards">
                <div class="stat-card">
                    <h3>₱0.00</h3>
                    <p>Gross Revenue</p>
                </div>
                <div class="stat-card">
                    <h3>₱0.00</h3>
                    <p>Total Discounts</p>
                </div>
                <div class="stat-card">
                    <h3>₱0.00</h3>
                    <p>Average Sales</p>
                </div>
                <div class="stat-card">
                    <h3>₱0.00</h3>
                    <p>Net Sales</p>
                </div>
            </div>

            <div class="welcome-section">
                <h3>Quick Actions</h3>
                <p>This is a basic dashboard. The system is now properly configured with:</p>
                <ul>
                    <li> Login Controller with authentication</li>
                    <li> Session management</li>
                    <li> Proper routing</li>
                    <li> Error handling and flash messages</li>
                    <li> Logout functionality</li>
                </ul>
                <p><strong>Test credentials:</strong> Username: <code>admin</code>, Password: <code>password</code></p>
            </div>
        </div>
    </div>
</body>
</html>
