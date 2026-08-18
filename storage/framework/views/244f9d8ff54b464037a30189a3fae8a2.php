<?php
    $brandLogoPath = null;
    foreach (['images/logo.png', 'images/logo.jpg', 'images/logo.jpeg', 'images/logo.svg'] as $candidate) {
        if (file_exists(public_path($candidate))) {
            $brandLogoPath = asset($candidate);
            break;
        }
    }
?>

<footer class="sc-footer">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4">
                <a class="sc-brand mb-3 d-inline-flex" href="<?php echo e(route('home')); ?>">
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
                <p class="text-slate mb-4" style="max-width: 320px;">
                    A regulated foundation for holding, moving, and settling digital assets — built for businesses that answer to a board, not a chart.
                </p>
                <div class="d-flex gap-2">
                    <a href="#" class="social-dot" aria-label="X / Twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="social-dot" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="social-dot" aria-label="GitHub"><i class="bi bi-github"></i></a>
                    <a href="#" class="social-dot" aria-label="Telegram"><i class="bi bi-telegram"></i></a>
                </div>
            </div>

            <div class="col-6 col-lg-2">
                <h6>Product</h6>
                <div class="d-flex flex-column">
                    <a href="<?php echo e(route('services')); ?>">Custody</a>
                    <a href="<?php echo e(route('services')); ?>">Treasury</a>
                    <a href="<?php echo e(route('market')); ?>">Market data</a>
                    <a href="<?php echo e(route('services')); ?>">Settlement</a>
                </div>
            </div>

            <div class="col-6 col-lg-2">
                <h6>Company</h6>
                <div class="d-flex flex-column">
                    <a href="<?php echo e(route('about')); ?>">About</a>
                    <a href="<?php echo e(route('about')); ?>">Security</a>
                    <a href="<?php echo e(route('contact')); ?>">Careers</a>
                    <a href="<?php echo e(route('contact')); ?>">Press</a>
                </div>
            </div>

            <div class="col-6 col-lg-2">
                <h6>Resources</h6>
                <div class="d-flex flex-column">
                    <a href="<?php echo e(route('market')); ?>">Market briefings</a>
                    <a href="<?php echo e(route('contact')); ?>">Support</a>
                    <a href="#">API status</a>
                    <a href="#">Docs</a>
                </div>
            </div>

            <div class="col-6 col-lg-2">
                <h6>Legal</h6>
                <div class="d-flex flex-column">
                    <a href="#">Terms</a>
                    <a href="#">Privacy</a>
                    <a href="#">Compliance</a>
                    <a href="#">Risk disclosure</a>
                </div>
            </div>
        </div>

        <div class="bottom-bar d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <span>&copy; <?php echo e(date('Y')); ?> StarCurrency Financial Technologies. All rights reserved.</span>
            <span>Digital assets carry risk, including loss of principal.</span>
        </div>
    </div>
</footer>
<?php /**PATH D:\starcurrecy\resources\views/partials/footer.blade.php ENDPATH**/ ?>