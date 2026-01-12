@extends('master.layout')

@section('content')
<section id="login" class="hero section dark-background">
    <img src="{{ asset('assets/img/hero-img.jpg') }}" alt="" data-aos="fade-in">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card bg-dark text-white border-0 shadow-lg" style="background: rgba(0,0,0,0.7) !important;">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Login</h2>
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3 text-start">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3 text-start">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check text-start">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" border-0 for="remember">Remember Me</label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary py-2 mt-2" style="background: var(--accent-color); border: none;">
                                    Sign In
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" style="color: var(--accent-color);">Register here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection