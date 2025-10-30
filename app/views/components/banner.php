<?php
// components/banner.php
$bannerTitle = $bannerTitle ?? "Welcome to OnlineShop!";
$bannerSubtitle = $bannerSubtitle ?? "Quality products delivered to your doorstep";
$bannerButtonText = $bannerButtonText ?? "Shop Now";
$bannerButtonLink = $bannerButtonLink ?? "/Program/Step/onlineshop/public/products";
$bannerStyle = $bannerStyle ?? "gradient"; // gradient, minimal, modern, elegant
$bannerAnimation = $bannerAnimation ?? true;
?>

<div class="banner banner-<?php echo htmlspecialchars($bannerStyle); ?>" 
     data-animate="<?php echo $bannerAnimation ? 'true' : 'false'; ?>">
    
    <!-- Decorative Background Elements -->
    <div class="banner-bg-elements">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <?php if ($bannerStyle === 'elegant'): ?>
            <div class="floating-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="floating-icon">
                <i class="fas fa-heart"></i>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Content -->
    <div class="banner-content">
        <h1 class="banner-title"><?php echo htmlspecialchars($bannerTitle); ?></h1>
        <p class="banner-subtitle"><?php echo htmlspecialchars($bannerSubtitle); ?></p>
        <div class="banner-actions">
            <a href="<?php echo htmlspecialchars($bannerButtonLink); ?>" class="banner-btn primary">
                <?php echo htmlspecialchars($bannerButtonText); ?>
            </a>
            <?php if ($bannerStyle === 'modern'): ?>
                <a href="/Program/Step/onlineshop/public/about" class="banner-btn secondary">
                    Learn More
                </a>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Optional Badge -->
    <?php if ($bannerStyle === 'minimal'): ?>
        <div class="banner-badge">
            <span>New Arrivals</span>
        </div>
    <?php endif; ?>
</div>