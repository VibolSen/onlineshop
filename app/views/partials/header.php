<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title ?? 'Online Shop'); ?></title>
    <link rel="stylesheet" href="/Program/Step/onlineshop/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/Program/Step/onlineshop/assets/css/header.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="/Program/Step/onlineshop/public/">
                    <i class="fas fa-store"></i>
                    <span>OnlineShop</span>
                </a>
            </div>
            <div class="nav-links">
                <a href="/Program/Step/onlineshop/public/products">
                    <i class="fas fa-box"></i>
                    <span>Products</span>
                </a>
                <div class="search-form-container">
                    <form action="/Program/Step/onlineshop/public/products/search" method="GET" class="search-form">
                        <input type="text" name="query" placeholder="Search products..." value="<?php echo htmlspecialchars($_GET['query'] ?? ''); ?>">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <a href="/Program/Step/onlineshop/public/cart" class="cart-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Cart</span>
                    <?php if (isset($_SESSION['cart_count']) && $_SESSION['cart_count'] > 0): ?>
                        <span class="cart-count"><?php echo $_SESSION['cart_count']; ?></span>
                    <?php endif; ?>
                </a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if ($_SESSION['role'] === 'admin'): ?>
                        <a href="/Program/Step/onlineshop/public/admin" class="admin-link">
                            <i class="fas fa-crown"></i>
                            <span>Dashboard</span>
                        </a>
                    <?php endif; ?>
                    <a href="/Program/Step/onlineshop/public/profile">
                        <i class="fas fa-user-circle"></i>
                        <span>Profile</span>
                    </a>
                    <a href="/Program/Step/onlineshop/public/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                <?php else: ?>
                    <a href="/Program/Step/onlineshop/public/login">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                    <a href="/Program/Step/onlineshop/public/register">
                        <i class="fas fa-user-plus"></i>
                        <span>Register</span>
                    </a>
                <?php endif; ?>
            </div>
            <div class="mobile-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>