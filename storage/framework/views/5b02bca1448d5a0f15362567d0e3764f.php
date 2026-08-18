

<?php $__env->startSection('title', 'Admin Dashboard | StarCurrency'); ?>

<?php $__env->startSection('content'); ?>
<section class="admin-shell">
    <div class="container">
        <div class="admin-layout">
            <aside class="admin-sidebar panel">
                <div class="admin-sidebar-header">
                    <p class="eyebrow mb-2 d-inline-flex">Operations center</p>
                    <h2>Admin</h2>
                </div>

                <nav class="admin-sidebar-nav" aria-label="Admin sections">
                    <a href="#admin-overview" class="admin-sidebar-link active">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Overview</span>
                    </a>
                    <a href="#admin-users" class="admin-sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Manage Users</span>
                    </a>
                    <a href="#admin-activity" class="admin-sidebar-link">
                        <i class="bi bi-activity"></i>
                        <span>User Activity</span>
                    </a>
                </nav>

                <div class="admin-sidebar-footer">
                    <span class="admin-pill">Online</span>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-outline-ivory btn-sm-pill w-100">Log out</button>
                    </form>
                </div>
            </aside>

            <div class="admin-main">
                <div class="admin-topbar">
                    <div>
                        <p class="eyebrow mb-2 d-inline-flex">Dashboard</p>
                        <h1>Admin Dashboard</h1>
                    </div>
                    <div class="admin-topbar-actions">
                        <span class="admin-pill soft">System</span>
                    </div>
                </div>

                <?php if(session('success')): ?>
                    <div class="alert auth-success mt-3" role="alert">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <section id="admin-overview" class="admin-section-block">
                    <div class="admin-section-head">
                        <h2>Overview</h2>
                    </div>

                    <div class="row g-4">
                        <?php
                            $cards = [
                                ['label' => 'Total users', 'value' => $stats['total_users'], 'icon' => 'bi-people-fill', 'tone' => 'gold'],
                                ['label' => 'Active users', 'value' => $stats['active_users'], 'icon' => 'bi-check2-circle', 'tone' => 'mint'],
                                ['label' => 'Suspended users', 'value' => $stats['suspended_users'], 'icon' => 'bi-slash-circle', 'tone' => 'rose'],
                                ['label' => 'New this week', 'value' => $stats['new_users_this_week'], 'icon' => 'bi-graph-up-arrow', 'tone' => 'violet'],
                            ];
                        ?>

                        <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-xl-3">
                                <div class="admin-stat-card tone-<?php echo e($card['tone']); ?>">
                                    <div class="admin-stat-icon"><i class="bi <?php echo e($card['icon']); ?>"></i></div>
                                    <div>
                                        <div class="admin-stat-label"><?php echo e($card['label']); ?></div>
                                        <div class="admin-stat-value"><?php echo e($card['value']); ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>

                <section id="admin-users" class="admin-section-block">
                    <div class="admin-section-head">
                        <h2>Manage Users</h2>
                        <div class="admin-search-box">
                            <i class="bi bi-search"></i>
                            <input type="text" placeholder="Search users" aria-label="Search users" data-user-search>
                        </div>
                    </div>

                    <div class="admin-panel panel">
                        <div class="table-responsive">
                            <table class="market-table admin-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-user-row>
                                            <td><?php echo e($user->name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e(ucfirst($user->role ?? 'user')); ?></td>
                                            <td>
                                                <span class="status-pill <?php echo e($user->status === 'active' ? 'status-active' : 'status-suspended'); ?>">
                                                    <?php echo e(ucfirst($user->status ?? 'active')); ?>

                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <form method="POST" action="<?php echo e(route('admin.users.toggle-status', $user)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <button class="btn btn-sm btn-outline-ivory" type="submit">
                                                            <?php echo e($user->status === 'active' ? 'Suspend' : 'Activate'); ?>

                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <section id="admin-activity" class="admin-section-block">
                    <div class="admin-section-head">
                        <h2>User Activity</h2>
                        <span class="admin-pill soft">Live feed</span>
                    </div>

                    <div class="activity-feed">
                        <?php $__currentLoopData = $userActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article class="activity-item">
                                <div class="activity-icon activity-<?php echo e($activity['status']); ?>">
                                    <i class="bi <?php echo e($activity['status'] === 'success' ? 'bi-check-circle-fill' : ($activity['status'] === 'warning' ? 'bi-exclamation-triangle-fill' : 'bi-info-circle-fill')); ?>"></i>
                                </div>
                                <div class="activity-body">
                                    <div class="activity-topline">
                                        <strong><?php echo e($activity['user']); ?></strong>
                                        <span><?php echo e($activity['time']); ?></span>
                                    </div>
                                    <div class="activity-meta">
                                        <span class="activity-type"><?php echo e($activity['type']); ?></span>
                                        <span class="status-pill <?php echo e($activity['status'] === 'success' ? 'status-active' : ($activity['status'] === 'warning' ? 'status-pending' : 'status-review')); ?>">
                                            <?php echo e(ucfirst($activity['status'])); ?>

                                        </span>
                                    </div>
                                    <p><?php echo e($activity['label']); ?></p>
                                    <small><?php echo e($activity['email']); ?></small>
                                </div>
                            </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarLinks = document.querySelectorAll('.admin-sidebar-link');
        const sections = document.querySelectorAll('.admin-section-block');

        sidebarLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                sidebarLinks.forEach(item => item.classList.remove('active'));
                this.classList.add('active');
            });
        });

        const searchInput = document.querySelector('[data-user-search]');
        if (!searchInput) return;

        searchInput.addEventListener('input', function () {
            const term = this.value.toLowerCase();
            document.querySelectorAll('[data-user-row]').forEach(function (row) {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(term) ? '' : 'none';
            });
        });

        if (sections.length) {
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;

                    const activeId = entry.target.getAttribute('id');
                    sidebarLinks.forEach(function (link) {
                        const matches = link.getAttribute('href') === '#' + activeId;
                        link.classList.toggle('active', matches);
                    });
                });
            }, { threshold: 0.45 });

            sections.forEach(section => observer.observe(section));
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\starcurrecy\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>