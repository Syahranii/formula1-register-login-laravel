<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            /* Formula 1 Inspired Color Palette */
            --primary-color: #e10600; /* F1 Red */
            --primary-light: #ff3333;
            --primary-dark: #cc0000;
            --secondary-color: #1e1e1e; /* Racing Dark */
            --accent-color: #15151e; /* F1 Deep Blue */
            --accent-secondary: #00d2be; /* Mercedes Teal */
            --success-color: #27f4d2;
            --info-color: #37b7e5;
            --warning-color: #f1c40f;
            --danger-color: #e10600;
            --light-bg: #f8f9fa;
            --white: #ffffff;
            --dark-text: #242424;
            --gray-text: #6c757d;
            --light-text: #999999;
            --border-color: #e4e4e4;
            --racing-stripe: #15151e; /* For racing stripe accents */
            --racing-silver: #d3d3d3;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6, .brand-logo, .nav-link, .sidebar-menu .menu-header {
            font-family: 'Titillium Web', sans-serif;
            font-weight: 600;
        }

        /* Header Styles */
        .main-header {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 3px solid var(--primary-color);
        }

        .main-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--accent-secondary) 100%);
        }

        .brand-logo {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar-toggler {
            border: none;
            padding: 0.25rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .nav-link {
            color: var(--dark-text) !important;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
            padding: 1.5rem 1rem !important;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: 0;
            left: 50%;
            background-color: var(--primary-color);
            transition: all 0.3s;
        }

        .nav-link:hover::after {
            width: 80%;
            left: 10%;
        }

        .nav-icon {
            margin-right: 6px;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background: linear-gradient(to bottom, var(--secondary-color), var(--accent-color));
            border-right: 1px solid rgba(255,255,255,0.1);
            height: calc(100vh - 70px);
            position: fixed;
            top: 70px;
            left: 0;
            transition: all 0.3s;
            z-index: 990;
            padding-top: 1rem;
            box-shadow: 5px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, var(--primary-color), transparent);
        }

        .sidebar-hidden {
            left: -260px;
        }

        .sidebar-toggle {
            position: fixed;
            left: 260px;
            top: 80px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 0 5px 5px 0;
            padding: 0.5rem;
            z-index: 995;
            transition: all 0.3s;
            box-shadow: 2px 0 5px rgba(0,0,0,0.2);
        }

        .sidebar-toggle.shifted {
            left: 0;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu .menu-header {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--racing-silver);
            padding: 1.2rem 1.5rem 0.5rem;
            opacity: 0.7;
        }

        .sidebar-menu .menu-item {
            padding: 0.3rem 1.5rem;
        }

        .sidebar-menu .menu-link {
            display: flex;
            align-items: center;
            color: var(--white);
            text-decoration: none;
            font-weight: 400;
            padding: 0.75rem 1rem;
            border-radius: 6px;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
        }

        .sidebar-menu .menu-link:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background-color: var(--primary-color);
            opacity: 0;
            transition: all 0.3s;
        }

        .sidebar-menu .menu-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar-menu .menu-link:hover:before {
            opacity: 1;
        }

        .sidebar-menu .menu-link.active {
            background-color: rgba(225, 6, 0, 0.2);
            color: var(--white);
        }

        .sidebar-menu .menu-link.active:before {
            opacity: 1;
        }

        .sidebar-menu .menu-icon {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            color: var(--accent-secondary);
        }

        /* Content Area */
        .content-wrapper {
            margin-left: 260px;
            transition: all 0.3s;
            flex: 1;
            padding: 2rem;
            margin-top: 70px;
        }

        .content-wrapper.full-width {
            margin-left: 0;
        }

        /* Cards */
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: none;
            overflow: hidden;
            margin-bottom: 1.5rem;
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background-color: var(--primary-color);
            opacity: 0.8;
        }

        .card-header {
            background-color: var(--white);
            border-bottom: 1px solid var(--border-color);
            padding: 1.2rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 1rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .auth-card {
            max-width: 500px;
            margin: 2rem auto;
            background: linear-gradient(135deg, var(--white) 0%, var(--light-bg) 100%);
        }

        .auth-card::before {
            width: 100%;
            height: 4px;
        }

        /* Form Elements */
        .form-control, .input-group-text {
            border-radius: 6px;
            padding: 0.7rem 1rem;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--accent-secondary);
            box-shadow: 0 0 0 0.2rem rgba(0, 210, 190, 0.25);
        }

        .input-group-text {
            background-color: var(--light-bg);
            border-right: none;
        }

        /* Buttons */
        .btn {
            border-radius: 6px;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
            position: relative;
            overflow: hidden;
        }

        .btn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(255, 255, 255, 0.2);
            transition: all 0.3s;
            z-index: 1;
        }

        .btn:hover::after {
            height: 100%;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: var(--white);
        }

        .btn-secondary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--white);
        }

        .btn-secondary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }

        /* Footer */
        .footer {
            background-color: var(--secondary-color);
            padding: 2rem 0;
            border-top: 3px solid var(--primary-color);
            text-align: center;
            font-size: 0.9rem;
            color: var(--racing-silver);
            margin-top: auto;
        }

        .footer-links {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin: 1rem 0;
        }

        .footer-links li {
            margin: 0 1rem;
        }

        .footer-links a {
            color: var(--racing-silver);
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }

        .footer-links a:hover {
            color: var(--primary-light);
        }

        .social-icons {
            margin-bottom: 1.5rem;
        }

        .social-icons a {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 38px;
            height: 38px;
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            border-radius: 50%;
            margin: 0 0.4rem;
            transition: all 0.3s;
        }

        .social-icons a:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: translateY(-3px);
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .animated {
            animation: fadeIn 0.5s ease-out;
        }

        .menu-item {
            animation: slideIn 0.3s ease-out forwards;
            opacity: 0;
        }

        .sidebar-menu .menu-item:nth-child(2) { animation-delay: 0.1s; }
        .sidebar-menu .menu-item:nth-child(3) { animation-delay: 0.2s; }
        .sidebar-menu .menu-item:nth-child(4) { animation-delay: 0.3s; }
        .sidebar-menu .menu-item:nth-child(5) { animation-delay: 0.4s; }
        .sidebar-menu .menu-item:nth-child(6) { animation-delay: 0.5s; }
        .sidebar-menu .menu-item:nth-child(7) { animation-delay: 0.6s; }
        .sidebar-menu .menu-item:nth-child(8) { animation-delay: 0.7s; }
        .sidebar-menu .menu-item:nth-child(9) { animation-delay: 0.8s; }

        /* Additional F1 Design Elements */
        .checkered-flag {
            position: relative;
        }

        .checkered-flag::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            width: 20px;
            height: 100%;
            background-image: linear-gradient(45deg, #000 25%, transparent 25%, transparent 50%, #000 50%, #000 75%, transparent 75%, transparent);
            background-size: 10px 10px;
            opacity: 0.15;
        }

        /* Dropdown Styling */
        .dropdown-menu {
            border-radius: 6px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: none;
            padding: 0.5rem 0;
        }

        .dropdown-item {
            padding: 0.6rem 1.5rem;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: rgba(225, 6, 0, 0.1);
            color: var(--primary-color);
        }

        .dropdown-divider {
            margin: 0.3rem 0;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .sidebar {
                left: -260px;
            }
            
            .sidebar-toggle {
                left: 0;
            }
            
            .content-wrapper {
                margin-left: 0;
            }
            
            .sidebar.show {
                left: 0;
            }
            
            .sidebar-toggle.show {
                left: 260px;
            }
            
            .nav-link {
                padding: 1rem !important;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                    <i class="fas fa-flag-checkered me-2"></i>
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">
                                <i class="fas fa-tachometer-alt nav-icon"></i>Dashboard
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.login') }}">
                                    <i class="fas fa-sign-in-alt nav-icon"></i>Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.register') }}">
                                    <i class="fas fa-user-plus nav-icon"></i>Register
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle nav-icon"></i>{{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href=""><i class="fas fa-user me-2"></i>Profile</a></li>
                                    <li><a class="dropdown-item" href=""><i class="fas fa-cog me-2"></i>Settings</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">
                                            @csrf
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <ul class="sidebar-menu">
            <li class="menu-header">Main Navigation</li>
            <li class="menu-item">
                <a href="{{ url('/dashboard') }}" class="menu-link active">
                    <i class="fas fa-home menu-icon"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-user menu-icon"></i>
                    <span>My Profile</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-file-alt menu-icon"></i>
                    <span>Documents</span>
                </a>
            </li>
            
            <li class="menu-header">Management</li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-users menu-icon"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-cog menu-icon"></i>
                    <span>Settings</span>
                </a>
            </li>
            
            <li class="menu-header">Others</li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <i class="fas fa-question-circle menu-icon"></i>
                    <span>Help & Support</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Main Content -->
    <main class="content-wrapper" id="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            
            <ul class="footer-links">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            
            <p>© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Custom Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to all cards
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.classList.add('animated');
                card.style.animationDelay = `${index * 0.1}s`;
            });
            
            // Sidebar toggle functionality
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const content = document.getElementById('content');
            
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('sidebar-hidden');
                content.classList.toggle('full-width');
                sidebarToggle.classList.toggle('shifted');
                
                // Update icons
                const toggleIcon = sidebarToggle.querySelector('i');
                if (sidebar.classList.contains('sidebar-hidden')) {
                    toggleIcon.classList.remove('fa-bars');
                    toggleIcon.classList.add('fa-chevron-right');
                } else {
                    toggleIcon.classList.remove('fa-chevron-right');
                    toggleIcon.classList.add('fa-bars');
                }
            });
            
            // Handle responsive sidebar
            function checkWidth() {
                if (window.innerWidth < 992) {
                    sidebar.classList.add('sidebar-hidden');
                    content.classList.add('full-width');
                    sidebarToggle.classList.add('shifted');
                } else {
                    sidebar.classList.remove('sidebar-hidden');
                    content.classList.remove('full-width');
                    sidebarToggle.classList.remove('shifted');
                }
            }
            
            // Initial check
            checkWidth();
            
            // On resize
            window.addEventListener('resize', checkWidth);
        });
    </script>

    @if($message = Session::get('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ $message }}",
                icon: "success",
                confirmButtonColor: '#e10600'
            });
        </script>
    @endif

    @if($message = Session::get('failed'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ $message }}",
                confirmButtonColor: '#e10600'
            });
        </script>
    @endif
    
    @stack('scripts')
</body>
</html>