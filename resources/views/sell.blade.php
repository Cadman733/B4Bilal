@extends('master.layout')

@section('content')
<section class="section pt-5 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0 p-4">
                    <h3 class="text-center mb-4">Sell New Item</h3>
                    
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Item Name</label>
                            <input type="text" name="name" class="form-control" placeholder="What are you selling?" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select" required>
                                <option value="" selected disabled>Choose a category</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Books">Books</option>
                                <option value="Home">Home</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price (RM)</label>
                            <input type="number" name="price" step="0.01" class="form-control" placeholder="0.00" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">WhatsApp Number</label>
                            <input type="text" name="contact_number" class="form-control" placeholder="60123456789" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="picture" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-bthrift w-100 py-2">Post Listing</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@if(session('item_uploaded'))
<script>
    Swal.fire({
        title: 'Uploaded!',
        text: 'Your item is now live in the marketplace.',
        icon: 'success',
        confirmButtonText: 'Go to Dashboard',
        confirmButtonColor: '#a27b5e',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('main') }}";
        }
    });
</script>
@endif

@endsection