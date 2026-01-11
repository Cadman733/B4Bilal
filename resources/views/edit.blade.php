@extends('master.layout')

@section('content')
<section class="section pt-5 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0 p-4">
                    <h3 class="mb-4">Edit Your Item</h3>
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Item Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
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
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="contact_number" class="form-control" value="{{ $product->contact_number }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Current Image</label>
                            <img src="{{ asset('uploads/products/'.$product->picture) }}" width="100" class="rounded mb-2 border">
                            <input type="file" name="picture" class="form-control">
                            <small class="text-muted">Leave blank to keep current image</small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Update Listing</button>
                        <a href="{{ route('products.manage') }}" class="btn btn-link w-100 mt-2 text-decoration-none">Back to My Listings</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection