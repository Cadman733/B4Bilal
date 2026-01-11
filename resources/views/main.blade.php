@extends('master.layout')

@section('content')
<section id="hero" class="hero section dark-background">
    <img src="{{ asset('assets/img/hero-img.jpg') }}" alt="" data-aos="fade-in">

    <div class="container d-flex flex-column align-items-center justify-content-center text-center" data-aos="fade-up">
        <h2>Welcome, {{ Auth::user()->name }}!</h2>
        <p>What would you like to do today?</p>
        
        <div class="d-flex flex-wrap justify-content-center gap-4 mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-lg px-5 py-3" style="background: var(--accent-color); color: white; border-radius: 50px;">
                <i class="bi bi-cart-fill me-2"></i> I want to Buy
            </a>

            <a href="{{ route('products.create') }}" class="btn btn-lg px-5 py-3" style="border: 2px solid var(--accent-color); color: white; border-radius: 50px;">
                <i class="bi bi-tag-fill me-2"></i> I want to Sell
            </a>

            <a href="{{ route('products.manage') }}" class="btn btn-lg px-5 py-3" style="background: rgba(255,255,255,0.1); color: white; border-radius: 50px; border: 1px solid rgba(255,255,255,0.3);">
                <i class="bi bi-gear-fill me-2"></i> Manage My Items
            </a>
        </div>

        <div class="mt-5">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link text-white-50">Logout</button>
            </form>
        </div>
    </div>
</section>
@endsection