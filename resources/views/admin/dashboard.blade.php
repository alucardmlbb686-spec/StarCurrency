@extends('layouts.app')

@section('title', 'Admin Dashboard | StarCurrency')

@section('content')
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
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
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

                @if (session('success'))
                    <div class="alert auth-success mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <section id="admin-overview" class="admin-section-block">
                    <div class="admin-section-head">
                        <h2>Overview</h2>
                    </div>

                    <div class="row g-4">
                        @php
                            $cards = [
                                ['label' => 'Total users', 'value' => $stats['total_users'], 'icon' => 'bi-people-fill', 'tone' => 'gold'],
                                ['label' => 'Active users', 'value' => $stats['active_users'], 'icon' => 'bi-check2-circle', 'tone' => 'mint'],
                                ['label' => 'Suspended users', 'value' => $stats['suspended_users'], 'icon' => 'bi-slash-circle', 'tone' => 'rose'],
                                ['label' => 'New this week', 'value' => $stats['new_users_this_week'], 'icon' => 'bi-graph-up-arrow', 'tone' => 'violet'],
                            ];
                        @endphp

                        @foreach ($cards as $card)
                            <div class="col-md-6 col-xl-3">
                                <div class="admin-stat-card tone-{{ $card['tone'] }}">
                                    <div class="admin-stat-icon"><i class="bi {{ $card['icon'] }}"></i></div>
                                    <div>
                                        <div class="admin-stat-label">{{ $card['label'] }}</div>
                                        <div class="admin-stat-value">{{ $card['value'] }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                                    @foreach ($users as $user)
                                        <tr data-user-row>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucfirst($user->role ?? 'user') }}</td>
                                            <td>
                                                <span class="status-pill {{ $user->status === 'active' ? 'status-active' : 'status-suspended' }}">
                                                    {{ ucfirst($user->status ?? 'active') }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <form method="POST" action="{{ route('admin.users.toggle-status', $user) }}">
                                                        @csrf
                                                        <button class="btn btn-sm btn-outline-ivory" type="submit">
                                                            {{ $user->status === 'active' ? 'Suspend' : 'Activate' }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
                        @foreach ($userActivities as $activity)
                            <article class="activity-item">
                                <div class="activity-icon activity-{{ $activity['status'] }}">
                                    <i class="bi {{ $activity['status'] === 'success' ? 'bi-check-circle-fill' : ($activity['status'] === 'warning' ? 'bi-exclamation-triangle-fill' : 'bi-info-circle-fill') }}"></i>
                                </div>
                                <div class="activity-body">
                                    <div class="activity-topline">
                                        <strong>{{ $activity['user'] }}</strong>
                                        <span>{{ $activity['time'] }}</span>
                                    </div>
                                    <div class="activity-meta">
                                        <span class="activity-type">{{ $activity['type'] }}</span>
                                        <span class="status-pill {{ $activity['status'] === 'success' ? 'status-active' : ($activity['status'] === 'warning' ? 'status-pending' : 'status-review') }}">
                                            {{ ucfirst($activity['status']) }}
                                        </span>
                                    </div>
                                    <p>{{ $activity['label'] }}</p>
                                    <small>{{ $activity['email'] }}</small>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
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
@endpush
