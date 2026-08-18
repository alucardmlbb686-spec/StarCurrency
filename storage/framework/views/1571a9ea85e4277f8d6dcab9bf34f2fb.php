<?php $__env->startSection('title', 'Contact — StarCurrency'); ?>

<?php $__env->startSection('content'); ?>

<section class="hero pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <span class="eyebrow mb-4 d-inline-flex">Contact</span>
                <h1 class="mb-4">Let's talk about your treasury.</h1>
                <p class="lede">Whether you're opening your first account or migrating from another custodian, our team responds within one business day.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-border-top">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="d-flex flex-column gap-4">
                    <div class="d-flex gap-3">
                        <div class="icon-mark flex-shrink-0"><i class="bi bi-envelope fs-5"></i></div>
                        <div>
                            <h6 class="mb-1">Email</h6>
                            <p class="text-slate mb-0">support@starcurrency.com</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="icon-mark flex-shrink-0"><i class="bi bi-telephone fs-5"></i></div>
                        <div>
                            <h6 class="mb-1">Phone</h6>
                            <p class="text-slate mb-0">+44 20 7946 0958</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="icon-mark flex-shrink-0"><i class="bi bi-geo-alt fs-5"></i></div>
                        <div>
                            <h6 class="mb-1">Headquarters</h6>
                            <p class="text-slate mb-0">One Ledger Square, London EC2A, United Kingdom</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="panel p-4 p-lg-5">
                    <?php if(session('status')): ?>
                        <div class="alert py-2 small mb-4" style="background: rgba(85,212,168,0.1); border: 1px solid rgba(85,212,168,0.3); color: var(--sc-mint);">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('contact.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Full name</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-rose small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="email">Work email</label>
                                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-rose small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="subject">Subject</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="subject" name="subject" value="<?php echo e(old('subject')); ?>" placeholder="e.g. Opening a business account">
                                <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-rose small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="message">Message</label>
                                <textarea class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="message" name="message" rows="5" required><?php echo e(old('message')); ?></textarea>
                                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-rose small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-gold">Send message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\starcurrecy\resources\views/home/contact.blade.php ENDPATH**/ ?>