<?php
session_start();
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: manage_users.php");
    exit;
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($query);
$user = $result->fetch_assoc();

if (!$user) {
    header("Location: manage_users.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
    <header>
        <h1>Edit User</h1>
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <form action="update_user.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">


                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>

                <label for="password">Password:</label>
                <input type="text" id="Password" name="Password" value="<?php echo $user['password']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>

                <label for="role">Role:</label>
                <select id="role" name="role">
                    <option value="admin" <?php echo $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="user" <?php echo $user['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                </select>

                <button type="submit">Update User</button>
            </form>
        </section>
    </main>
    <footer>
        <p>© 2024 Retail Management System</p>
    </footer>
</body>
</html>
