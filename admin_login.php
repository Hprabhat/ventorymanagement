<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
    <header>
        <h1>Admin Login</h1>
    </header>
    <main>
        <section>
            <h2>Login to Admin Panel</h2>

            <!-- Show the login message if there's one in the session -->
            <?php
            session_start();
            if (isset($_SESSION['login_message'])): ?>
                <p style="color:red;"><?php echo $_SESSION['login_message']; ?></p>
                <?php
                // Clear the message after showing it
                unset($_SESSION['login_message']);
            endif;
            ?>

            <!-- Login Form -->
            <form action="process_login.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </section>
    </main>
    <footer>
        <p>© 2024 Retail Management System</p>
    </footer>
</body>
</html>
