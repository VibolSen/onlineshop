<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/onlineshop/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header id="header">
        <nav>
                    <div class="logo">
                        <a href="/onlineshop/public/"><i class="fas fa-store"></i> <span>Shop</span></a>
                    </div>
                    <div class="search-form-container">
                        <form action="/onlineshop/public/products" method="GET" class="search-form">
                            <input type="text" name="search" placeholder="Search products..." class="search-input">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="nav-links">                <a href="/onlineshop/public/"><i class="fas fa-home"></i> Home</a>
                <a href="/onlineshop/public/products"><i class="fas fa-box"></i> Products</a>
                <a href="/onlineshop/public/cart" class="cart-link" data-cart-count="0"><i class="fas fa-shopping-cart"></i> Cart <span class="cart-count">0</span></a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if ($_SESSION['role'] === 'admin'): ?>
                        <a href="/onlineshop/public/admin" class="admin-link" data-admin-link><i class="fas fa-user-shield"></i> Admin</a>
                    <?php endif; ?>
                    <a href="/onlineshop/public/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                <?php else: ?>
                    <a href="/onlineshop/public/login" data-login-link><i class="fas fa-sign-in-alt"></i> Login</a>
                    <a href="/onlineshop/public/register" data-login-link><i class="fas fa-user-plus"></i> Register</a>
                <?php endif; ?>
            </div>
            <div class="mobile-toggle mobile-menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>
</body>