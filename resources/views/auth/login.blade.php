@extends('layouts.app')

@section('title', 'Pit Lane Access')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth-card animated">
                <div class="card-header bg-gradient text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">{{ __('Pit Lane Access') }}</h4>
                        <i class="fas fa-racing-helmet fa-lg"></i>
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <p class="text-muted">Enter your credentials to access the racing dashboard</p>
                        <div class="racing-divider">
                            <span><i class="fas fa-bolt"></i></span>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('login_proses') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">{{ __('Driver Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-id-card"></i>
                                </span>
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}" required autocomplete="email" autofocus
                                       placeholder="Enter your registered email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Your team email address</small>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">{{ __('Pit Lane Pass') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                       required autocomplete="current-password"
                                       placeholder="Enter your secure password">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="racing-options mb-4 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" 
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label ms-2" for="remember">
                                    {{ __('Save Pit Credentials') }}
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="text-primary fw-bold" href="{{ route('password.request') }}">
                                    <i class="fas fa-wrench me-1"></i>{{ __('Reset Pass') }}
                                </a>
                            @endif
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-primary btn-lg racing-btn">
                                <i class="fas fa-tachometer-alt me-2"></i>{{ __('Enter Pit Lane') }}
                            </button>
                        </div>

                        <div class="racing-divider">
                            <span>QUICK ACCESS</span>
                        </div>

                        <div class="social-racing my-4">
                            <div class="row">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <a href="#" class="btn btn-outline-primary d-block racing-social-btn">
                                        <i class="fab fa-google me-2"></i>Google Speedway
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-outline-primary d-block racing-social-btn">
                                        <i class="fab fa-facebook-f me-2"></i>Facebook Racing
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4 pit-lane">
                            <p class="mb-2">Need a racing license?</p>
                            <a href="{{ route('auth.register') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-flag-checkered me-2"></i>{{ __('Join Racing Team') }}
                            </a>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer bg-light">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="racing-status">
                                <span class="status-indicator status-active"></span>
                                <span class="small fw-bold">Race Weekend Live</span>
                            </div>
                        </div>
                        <div class="col text-end">
                            <a href="#" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-headset me-1"></i> Team Radio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Formula One Theme Styling */
    body {
        background-image: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.85)), 
                          url('https://via.placeholder.com/1920x1080');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    .card {
        border-left: 5px solid #e10600;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }
    
    .card-header {
        background: linear-gradient(90deg, #e10600, #ff0100) !important;
        border-bottom: 0;
        padding: 1.25rem 1.5rem;
    }
    
    .bg-gradient {
        background: linear-gradient(90deg, #e10600, #ff0100) !important;
    }
    
    .btn-primary {
        background-color: #e10600;
        border-color: #e10600;
    }
    
    .btn-primary:hover {
        background-color: #c00500;
        border-color: #c00500;
    }
    
    .btn-outline-primary {
        color: #e10600;
        border-color: #e10600;
    }
    
    .btn-outline-primary:hover {
        background-color: #e10600;
        border-color: #e10600;
        color: white;
    }
    
    .text-primary {
        color: #e10600 !important;
    }
    
    .racing-btn {
        border-radius: 50px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .racing-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(225, 6, 0, 0.3);
    }
    
    .racing-btn::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: 0.5s;
    }
    
    .racing-btn:hover::after {
        left: 100%;
    }
    
    .racing-divider {
        display: flex;
        align-items: center;
        text-align: center;
        color: #64748b;
        margin: 1.5rem 0;
    }
    
    .racing-divider::before,
    .racing-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px dashed #64748b;
    }
    
    .racing-divider span {
        padding: 0 1rem;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 1px;
    }
    
    .form-control:focus {
        border-color: #e10600;
        box-shadow: 0 0 0 0.25rem rgba(225, 6, 0, 0.25);
    }
    
    .form-check-input:checked {
        background-color: #e10600;
        border-color: #e10600;
    }
    
    .card-footer {
        border-top: 1px dashed #e2e8f0;
    }
    
    .input-group-text {
        background-color: #f8fafc;
    }
    
    .racing-social-btn {
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .racing-social-btn:hover {
        transform: translateX(5px);
    }
    
    .status-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }
    
    .status-active {
        background-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
        70% { box-shadow: 0 0 0 5px rgba(16, 185, 129, 0); }
        100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }
    
    /* Race-themed icon */
    .fa-racing-helmet:before {
        content: "\f1eb";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
    }
    
    /* Animation for smoother hover transitions */
    .auth-card {
        transition: transform 0.3s ease;
    }
    
    .auth-card:hover {
        transform: translateY(-5px);
    }
    
    .btn-outline-danger {
        color: #e10600;
        border-color: #e10600;
    }
    
    .btn-outline-danger:hover {
        background-color: #e10600;
        border-color: #e10600;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password toggle visibility
        const togglePassword = document.querySelector('.toggle-password');
        if (togglePassword) {
            togglePassword.addEventListener('click', function() {
                const passwordInput = this.previousElementSibling;
                const icon = this.querySelector('i');
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        }
        
        // Racing animation for button
        const racingBtn = document.querySelector('.racing-btn');
        if (racingBtn) {
            racingBtn.addEventListener('mouseenter', function() {
                this.innerHTML = '<i class="fas fa-bolt me-2"></i>Full Throttle!';
            });
            
            racingBtn.addEventListener('mouseleave', function() {
                this.innerHTML = '<i class="fas fa-tachometer-alt me-2"></i>Enter Pit Lane';
            });
        }
        
        // Add racing sound effect
        const card = document.querySelector('.auth-card');
        if (card) {
            card.addEventListener('mouseenter', function() {
                // If you want to add sound effects, you could initialize them here
                // const sound = new Audio('path/to/engine-rev.mp3');
                // sound.volume = 0.2;
                // sound.play();
            });
        }
    });
</script>
@endpush
@endsection