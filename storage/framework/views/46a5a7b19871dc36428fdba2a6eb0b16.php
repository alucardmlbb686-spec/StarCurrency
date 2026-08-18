<?php $__env->startSection('title', 'About — StarCurrency'); ?>

<?php $__env->startSection('content'); ?>

<section class="hero pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <span class="eyebrow mb-4 d-inline-flex">About StarCurrency</span>
                <h1 class="mb-4">We started StarCurrency because treasury teams deserved better than a trading app.</h1>
                <p class="lede">Founded by veterans of institutional finance and distributed systems, StarCurrency exists to make digital assets ordinary infrastructure — auditable, governed, and boring in the best possible way.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-border-top">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-mark"><i class="bi bi-bullseye fs-5"></i></div>
                    <h5 class="mb-2">Our mission</h5>
                    <p class="text-slate mb-0">Make holding and moving digital assets as reliable, governed, and dull as wiring fiat — so businesses can focus on what they build, not what they custody.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-mark"><i class="bi bi-eye fs-5"></i></div>
                    <h5 class="mb-2">Our vision</h5>
                    <p class="text-slate mb-0">A financial system where digital and traditional assets settle on the same rails, under the same standard of proof.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-mark"><i class="bi bi-award fs-5"></i></div>
                    <h5 class="mb-2">Our standard</h5>
                    <p class="text-slate mb-0">If a control wouldn't satisfy a bank's risk committee, it doesn't ship. That bar hasn't moved since day one.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-border-top">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4">
                <span class="eyebrow mb-3 d-inline-flex">Timeline</span>
                <h2 class="mb-3" style="font-size: clamp(1.9rem, 3vw, 2.6rem);">How we got here.</h2>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <div class="process-step">
                    <div class="eyebrow mb-2">2021</div>
                    <h5>Founded in London</h5>
                    <p class="text-slate mb-0">StarCurrency is founded by a small team from institutional custody and payments backgrounds.</p>
                </div>
                <div class="process-step">
                    <div class="eyebrow mb-2">2022</div>
                    <h5>First custody license</h5>
                    <p class="text-slate mb-0">Secured our first regulatory license and onboarded our first 50 business clients.</p>
                </div>
                <div class="process-step">
                    <div class="eyebrow mb-2">2024</div>
                    <h5>Global settlement rails</h5>
                    <p class="text-slate mb-0">Launched same-day settlement across 40+ currencies and passed our first SOC 2 Type II audit.</p>
                </div>
                <div class="process-step">
                    <div class="eyebrow mb-2">2026</div>
                    <h5>$4.8B in custody</h5>
                    <p class="text-slate mb-0">Now serving 1,400+ businesses across 120 countries, with assets under custody surpassing $4.8B.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-border-top">
    <div class="container">
        <div class="cta-band">
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <h2 class="mb-2" style="font-size: clamp(1.8rem, 3vw, 2.3rem);">Want to know more about how we're governed?</h2>
                    <p class="text-slate mb-0">Our security and compliance team is happy to walk your board through it.</p>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <a href="<?php echo e(route('contact')); ?>" class="btn btn-gold">Talk to our team</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\starcurrecy\resources\views/home/about.blade.php ENDPATH**/ ?>