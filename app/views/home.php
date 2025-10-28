<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/Program/Step/onlineshop/assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/Program/Step/onlineshop/public/">Home</a>
            <a href="/Program/Step/onlineshop/public/products">Products</a>
            <a href="/Program/Step/onlineshop/public/cart">Cart</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <a href="/Program/Step/onlineshop/public/admin">Admin Dashboard</a>
                <?php endif; ?>
                <a href="/Program/Step/onlineshop/public/logout">Logout</a>
            <?php else: ?>
                <a href="/Program/Step/onlineshop/public/login">Login</a>
                <a href="/Program/Step/onlineshop/public/register">Register</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <h1><?php echo $title; ?></h1>
        <p>This is the homepage of our online shop.</p>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Online Shop</p>
    </footer>
</body>
</html>