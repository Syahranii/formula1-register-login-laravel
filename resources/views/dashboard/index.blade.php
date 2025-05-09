@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
<style>
    :root {
        --f1-red: #e10600;
        --f1-dark: #1e1e1e;
        --f1-light: #f8f8f8;
        --f1-accent: #ff1801;
        --f1-soft-red: rgba(225, 6, 0, 0.1);
    }
    
    body {
        background-color: var(--f1-light);
    }
    
    .dashboard-card {
        border-left: 4px solid var(--f1-red);
        transition: all 0.3s ease;
        background-color: white;
        border-radius: 8px;
    }
    
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(225, 6, 0, 0.15);
    }
    
    .stat-number {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--f1-red);
        font-family: 'Titillium Web', sans-serif;
    }
    
    .recent-activity-item {
        border-left: 3px solid var(--f1-red);
        transition: all 0.2s ease;
    }
    
    .recent-activity-item:hover {
        background-color: var(--f1-soft-red);
    }
    
    .badge-soft-red {
        background-color: var(--f1-soft-red);
        color: var(--f1-red);
        font-weight: 600;
    }
    
    .welcome-banner {
        background: linear-gradient(135deg, var(--f1-dark), var(--f1-red));
        border-radius: 12px;
        border-bottom: 4px solid var(--f1-accent);
    }
    
    .quick-action-card {
        transition: all 0.3s ease;
        border: 1px solid #eaeaea;
        border-radius: 8px;
    }
    
    .quick-action-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(225, 6, 0, 0.1);
        border-color: var(--f1-red);
    }
    
    .quick-action-card .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: var(--f1-soft-red);
        color: var(--f1-red);
        font-size: 1.25rem;
    }
    
    .card-header {
        border-bottom: 2px solid var(--f1-red);
        background-color: white !important;
    }
    
    .btn-outline-primary {
        border-color: var(--f1-red);
        color: var(--f1-red);
    }
    
    .btn-outline-primary:hover {
        background-color: var(--f1-red);
        color: white;
    }
    
    .text-primary {
        color: var(--f1-red) !important;
    }
    
    .badge.bg-success {
        background-color: var(--f1-red) !important;
    }
    
    .btn-light {
        background-color: white;
        color: var(--f1-red);
        font-weight: 600;
    }
    
    h2, h5, h6 {
        font-family: 'Titillium Web', sans-serif;
        font-weight: 600;
    }
    
    .text-uppercase {
        letter-spacing: 0.05em;
        font-weight: 600;
        color: var(--f1-dark);
    }
</style>
<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid py-4">
    <!-- Welcome Banner with F1 Style -->
    <div class="welcome-banner text-white p-4 mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-2">Welcome to Pit Lane, {{ Auth::user()->name }}!</h2>
                <p class="mb-0 opacity-85">You have 5 new tasks, 3 unread messages in your inbox</p>
            </div>
            <div class="col-md-4 text-md-end">
                <button class="btn btn-light btn-sm">
                    <i class="fas fa-flag me-1"></i> 3 Notifications
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Cards - F1 Style -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Total Users</h6>
                            <h2 class="stat-number mb-0">1,245</h2>
                        </div>
                        <span class="badge rounded-pill">
                            <i class="fas fa-arrow-up me-1"></i> 12%
                        </span>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="text-primary small">View details <i class="fas fa-chevron-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Total Revenue</h6>
                            <h2 class="stat-number mb-0">$8,542</h2>
                        </div>
                        <span class="badge rounded-pill">
                            <i class="fas fa-arrow-up me-1"></i> 8%
                        </span>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="text-primary small">View report <i class="fas fa-chevron-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Total Products</h6>
                            <h2 class="stat-number mb-0">324</h2>
                        </div>
                        <span class="badge bg-danger rounded-pill">
                            <i class="fas fa-arrow-down me-1"></i> 3%
                        </span>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="text-primary small">Manage products <i class="fas fa-chevron-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">Today's Activity</h6>
                            <h2 class="stat-number mb-0">48</h2>
                        </div>
                        <span class="badge rounded-pill">
                            <i class="fas fa-arrow-up me-1"></i> 22%
                        </span>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="text-primary small">View activity <i class="fas fa-chevron-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Recent Activities - F1 Style -->
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Recent Laps</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item recent-activity-item border-0 py-3 px-0">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <span class="badge badge-soft-red p-2">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">New user registered</h6>
                                    <p class="mb-0 text-muted">John Doe has joined as a new user</p>
                                    <small class="text-muted">10 minutes ago</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="list-group-item recent-activity-item border-0 py-3 px-0">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <span class="badge badge-soft-red p-2">
                                        <i class="fas fa-shopping-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">New order placed</h6>
                                    <p class="mb-0 text-muted">Order #1234 has been created</p>
                                    <small class="text-muted">1 hour ago</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="list-group-item recent-activity-item border-0 py-3 px-0">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <span class="badge badge-soft-red p-2">
                                        <i class="fas fa-tasks"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Task completed</h6>
                                    <p class="mb-0 text-muted">Task "Update Dashboard" has been completed</p>
                                    <small class="text-muted">3 hours ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-outline-primary">View All Laps</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions - Pit Stop Style -->
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Pit Stop Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="#" class="card quick-action-card h-100 text-center p-3 text-decoration-none">
                                <div class="card-body">
                                    <div class="icon-circle mb-3">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <h6 class="mb-0">Add Product</h6>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="#" class="card quick-action-card h-100 text-center p-3 text-decoration-none">
                                <div class="card-body">
                                    <div class="icon-circle mb-3">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <h6 class="mb-0">Manage Team</h6>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="#" class="card quick-action-card h-100 text-center p-3 text-decoration-none">
                                <div class="card-body">
                                    <div class="icon-circle mb-3">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <h6 class="mb-0">Race Stats</h6>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="#" class="card quick-action-card h-100 text-center p-3 text-decoration-none">
                                <div class="card-body">
                                    <div class="icon-circle mb-3">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <h6 class="mb-0">Car Setup</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation for stat cards
    const statCards = document.querySelectorAll('.dashboard-card');
    statCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate__animated', 'animate__fadeInUp');
    });
    
    // Tooltip init
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
@endpush