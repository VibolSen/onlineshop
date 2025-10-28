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
        <div class="product-list">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-item">
                        <h3><a href="/Program/Step/onlineshop/public/product/show/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h3>
                        <p>Category: <?php echo $product['category_name']; ?></p>
                        <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
                        <?php if (!empty($product['image'])): ?>
                            <img src="/Program/Step/onlineshop/assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="100">
                        <?php endif; ?>
                        <p><?php echo substr($product['description'], 0, 100); ?>...</p>
                        <button>Add to Cart</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Online Shop</p>
    </footer>
</body>
</html>