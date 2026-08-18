<?php
    $brandLogoPath = null;
    foreach (['images/logo.png', 'images/logo.jpg', 'images/logo.jpeg', 'images/logo.svg'] as $candidate) {
        if (file_exists(public_path($candidate))) {
            $brandLogoPath = asset($candidate);
            break;
        }
    }
?>

<nav class="navbar navbar-expand-lg sc-navbar fixed-top">
    <div class="container">
        <a class="navbar-brand sc-brand" href="<?php echo e(route('home')); ?>">
            <?php if($brandLogoPath): ?>
                <img src="<?php echo e($brandLogoPath); ?>" alt="StarCurrency logo" class="sc-brand-logo" loading="lazy">
            <?php else: ?>
                <svg class="sc-brand-mark" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <circle cx="16" cy="16" r="15" stroke="#D4AF6A" stroke-width="1.2"/>
                    <path d="M16 6L18.2 13.6L26 16L18.2 18.4L16 26L13.8 18.4L6 16L13.8 13.6L16 6Z" fill="#D4AF6A"/>
                </svg>
            <?php endif; ?>
            StarCurrency
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#scNav" aria-controls="scNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="scNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>" href="<?php echo e(route('about')); ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('services') ? 'active' : ''); ?>" href="<?php echo e(route('services')); ?>">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('market') ? 'active' : ''); ?>" href="<?php echo e(route('market')); ?>">Market</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>" href="<?php echo e(route('contact')); ?>">Contact</a>
                </li>
            </ul>

            <div class="d-flex gap-2 mt-3 mt-lg-0 align-items-center">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->role === 'admin'): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-outline-ivory btn-sm-pill <?php echo e(request()->routeIs('admin.dashboard') ? 'active-nav' : ''); ?>">Dashboard</a>
                    <?php endif; ?>

                    <div class="dropdown">
                        <button class="btn btn-outline-ivory btn-sm-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Settings
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end sc-theme-menu">
                            <li><button type="button" class="dropdown-item theme-option" data-theme="dark">Dark mode</button></li>
                            <li><button type="button" class="dropdown-item theme-option" data-theme="light">Light mode</button></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item text-start">Log out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-ivory btn-sm-pill <?php echo e(request()->routeIs('login') ? 'active-nav' : ''); ?>">Log in</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-gold btn-sm-pill <?php echo e(request()->routeIs('register') ? 'active-nav' : ''); ?>">Open an account</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH D:\starcurrecy\resources\views/partials/navbar.blade.php ENDPATH**/ ?>