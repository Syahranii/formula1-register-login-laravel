@extends('layouts.app')

@section('title', 'Join The Pit Crew')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card auth-card animated">
                <div class="card-header bg-gradient text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">{{ __('Join The Racing Team') }}</h4>
                        <i class="fas fa-flag-checkered fa-lg"></i>
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <p class="text-muted">Begin your Formula One experience by creating your driver profile</p>
                        <div class="racing-divider">
                            <span><i class="fas fa-bolt"></i></span>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">{{ __('Driver Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user-astronaut"></i>
                                </span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                       placeholder="Enter your full name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Your name will appear on the leaderboard</small>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">{{ __('Pit Crew Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       placeholder="Enter your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <small class="form-text text-muted">We'll send race updates to this address</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-bold">{{ __('Secure Pit Pass') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-key"></i>
                                        </span>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                               name="password" required autocomplete="new-password"
                                               placeholder="Create your password">
                                        <button class="btn btn-outline-secondary toggle-password" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">Minimum 8 characters for proper security</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="password-confirm" class="form-label fw-bold">{{ __('Confirm Pit Pass') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-shield-alt"></i>
                                        </span>
                                        <input id="password-confirm" type="password" class="form-control" 
                                               name="password_confirmation" required autocomplete="new-password"
                                               placeholder="Confirm your password">
                                        <button class="btn btn-outline-secondary toggle-password" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="racing-checkbox">
                                <input type="checkbox" class="form-check-input" id="terms" required>
                                <label class="form-check-label ms-2" for="terms">
                                    I agree to the official <a href="#" class="text-primary fw-bold">Racing Regulations</a> and <a href="#" class="text-primary fw-bold">Paddock Policy</a>
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-primary btn-lg racing-btn">
                                <i class="fas fa-flag-checkered me-2"></i>{{ __('Start Your Engine') }}
                            </button>
                        </div>

                        <div class="racing-divider">
                            <span>OR</span>
                        </div>

                        <div class="social-racing my-4">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" class="btn btn-outline-primary d-block">
                                        <i class="fab fa-google me-2"></i>Google
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="btn btn-outline-primary d-block">
                                        <i class="fab fa-facebook-f me-2"></i>Facebook
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4 pit-lane">
                            <p class="mb-2">Already have a racing license?</p>
                            <a href="{{ route('auth.login') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-tachometer-alt me-2"></i>{{ __('Back to Pit Lane') }}
                            </a>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer bg-light">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="badge badge-tech text-white">
                                <i class="fas fa-headset me-1"></i> Team Radio
                            </span>
                        </div>
                        <div class="col">
                            <small class="text-muted">Need support? Contact our pit crew at <a href="mailto:support@f1racing.com" class="text-primary">support@f1racing.com</a></small>
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
        background-image: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.9)), url('https://via.placeholder.com/1920x1080');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    .card {
        border-left: 5px solid #e10600;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
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
    }
    
    .racing-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(225, 6, 0, 0.3);
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
    }
    
    .form-control:focus {
        border-color: #e10600;
        box-shadow: 0 0 0 0.25rem rgba(225, 6, 0, 0.25);
    }
    
    .racing-checkbox .form-check-input:checked {
        background-color: #e10600;
        border-color: #e10600;
    }
    
    .badge-tech {
        background-color: #e10600;
    }
    
    .card-footer {
        border-top: 1px dashed #e2e8f0;
    }
    
    .input-group-text {
        background-color: #f8fafc;
    }
    
    /* Animation for checkered flag */
    @keyframes wave {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(5deg); }
        75% { transform: rotate(-5deg); }
    }
    
    .fa-flag-checkered {
        animation: wave 3s infinite ease-in-out;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password toggle visibility
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const passwordInput = this.parentElement.querySelector('input');
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
        });
        
        // Racing animation for button
        const racingBtn = document.querySelector('.racing-btn');
        if (racingBtn) {
            racingBtn.addEventListener('mouseenter', function() {
                this.innerHTML = '<i class="fas fa-tachometer-alt me-2"></i>Rev Up & Go!';
            });
            
            racingBtn.addEventListener('mouseleave', function() {
                this.innerHTML = '<i class="fas fa-flag-checkered me-2"></i>Start Your Engine';
            });
        }
    });
</script>
@endpush
@endsection