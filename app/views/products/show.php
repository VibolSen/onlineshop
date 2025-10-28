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
                <a href="/Program/Step/onlineshop/public/logout">Logout</a>
            <?php else: ?>
                <a href="/Program/Step/onlineshop/public/login">Login</a>
                <a href="/Program/Step/onlineshop/public/register">Register</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <?php if (isset($product) && !empty($product)): ?>
            <h1><?php echo $product['name']; ?></h1>
            <div class="product-detail">
                <?php if (!empty($product['image'])): ?>
                    <img src="/Program/Step/onlineshop/assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" width="300">
                <?php endif; ?>
                <p><strong>Category:</strong> <?php echo $product['category_name']; ?></p>
                <p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
                <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
                <p><strong>Stock:</strong> <?php echo $product['stock']; ?></p>
                <button>Add to Cart</button>
            </div>
        <?php else: ?>
            <p>Product not found.</p>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Online Shop</p>
    </footer>
</body>
</html>