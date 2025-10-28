<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/Program/Step/onlineshop/assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/Program/Step/onlineshop/public/">Home</a>
            <a href="/Program/Step/onlineshop/public/products">Products</a>
            <a href="/Program/Step/onlineshop/public/cart">Cart</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/Program/Step/onlineshop/public/logout">Logout</a>
            <?php else: ?>
                <a href="/Program/Step/onlineshop/public/login">Login</a>
                <a href="/Program/Step/onlineshop/public/register">Register</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="/Program/Step/onlineshop/public/auth/login" method="POST">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="/Program/Step/onlineshop/public/auth/register">Register here</a>.</p>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Online Shop</p>
    </footer>
</body>
</html>