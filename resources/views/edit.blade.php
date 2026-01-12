@extends('master.layout')

@section('content')
<section class="section pt-5 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0 p-4">
                    <h3 class="text-center mb-4" style="color: #a27b5e;">Edit Your Item</h3>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Item Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select" required>
                                <option value="Electronics" {{ $product->category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                <option value="Fashion" {{ $product->category == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                <option value="Books" {{ $product->category == 'Books' ? 'selected' : '' }}>Books</option>
                                <option value="Home" {{ $product->category == 'Home' ? 'selected' : '' }}>Home</option>
                                <option value="Others" {{ $product->category == 'Others' ? 'selected' : '' }}>Others</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price (RM)</label>
                            <input type="number" name="price" step="0.01" class="form-control" value="{{ $product->price }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ $product->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">WhatsApp Number</label>
                            <input type="text" name="contact_number" class="form-control" value="{{ $product->contact_number }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Current Image</label>
                            <div class="mb-2">
                                <img src="{{ asset('uploads/products/'.$product->picture) }}" width="120" class="rounded border shadow-sm">
                            </div>
                            <label class="form-label">Change Image (Optional)</label>
                            <input type="file" name="picture" class="form-control">
                            <small class="text-muted">Leave blank to keep current image</small>
                        </div>

                        <button type="submit" class="btn w-100 py-2 text-white shadow-sm" style="background-color: #a27b5e; border-color: #a27b5e;">
                            <i class="bi bi-check-circle me-1"></i> Update Listing
                        </button>
                        
                        <a href="{{ route('products.manage') }}" class="btn w-100 mt-2 text-decoration-none shadow-sm" style="color: #a27b5e; border: 1px solid #a27b5e;">
                            <i class="bi bi-arrow-left me-1"></i> Back to My Listings
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection