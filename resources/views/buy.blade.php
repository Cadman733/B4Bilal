@extends('master.layout')

@section('content')
<div class="page-title accent-background" style="padding: 80px 0 30px 0;">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Marketplace</h1>
  </div>
</div>

<section id="marketplace" class="section">
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row gy-4">
            @forelse($products as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 overflow-hidden" style="border-radius: 15px;">
                        
                        <div style="height: 250px; overflow: hidden;">
                            <img src="{{ asset('uploads/products/' . $product->picture) }}" 
                                 class="card-img-top" 
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        </div>

                        <div class="card-body d-flex flex-column">
                            <div class="mb-1">
                                <span class="badge bg-secondary text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                                    {{ $product->category }}
                                </span>
                            </div>

                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h4 class="card-title fw-bold text-dark mb-0">{{ $product->name }}</h4>
                                <span class="badge bg-success fs-6">RM {{ number_format($product->price, 2) }}</span>
                            </div>

                            <p class="card-text text-muted flex-grow-1">
                                {{ Str::limit($product->description, 100) }}
                            </p>
                            
                            <hr>
                            
                            <div class="mb-3">
                                <small class="text-muted"><i class="bi bi-person"></i> Seller: <strong>{{ $product->user->name }}</strong></small>
                            </div>

                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $product->contact_number) }}" 
                               class="btn btn-success w-100 rounded-pill py-2">
                                <i class="bi bi-whatsapp me-2"></i> Contact Seller
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-bag-x text-muted" style="font-size: 3rem;"></i>
                    <p class="mt-3">No items available in the marketplace yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection