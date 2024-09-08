<?php
session_start();
include 'db.php';



// Fetch summary data
$userCountQuery = "SELECT COUNT(*) AS user_count FROM users";
$userCountResult = $conn->query($userCountQuery);
$userCount = $userCountResult->fetch_assoc()['user_count'];

$recentUsersQuery = "SELECT * FROM users ORDER BY created_at DESC LIMIT 5";
$recentUsersResult = $conn->query($recentUsersQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="dashboard-summary">
            <div class="box">
                <h3>Total Users</h3>
                <p><?php echo $userCount; ?></p>
            </div>
            <!-- Add more summary boxes as needed -->
        </section>

        <section>
            <h2>Recent Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($recentUsersResult->num_rows > 0) {
                        while ($row = $recentUsersResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['role'] . "</td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No recent users found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>© 2024 Retail Management System</p>
    </footer>
</body>
</html>
