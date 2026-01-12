@extends('master.layout')

@section('content')
<section class="section pt-5 mt-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="color: #a27b5e; font-weight: bold;">Get In Touch</h2>
            <p class="text-muted">Have questions about B-Thrift? We're here to help!</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="d-flex flex-column gap-3">
                    
                    <div class="card border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-light p-3 rounded-circle me-3">
                                <i class="bi bi-geo-alt-fill" style="color: #a27b5e; font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Office Location</h5>
                                <p class="mb-0 text-muted">Mahallah Bilal, IIUM Gombak</p>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-light p-3 rounded-circle me-3">
                                <i class="bi bi-envelope-fill" style="color: #a27b5e; font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">Customer Service</h5>
                                <p class="mb-0 text-muted">ananggoru@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm p-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-light p-3 rounded-circle me-3">
                                <i class="bi bi-people-fill" style="color: #a27b5e; font-size: 1.5rem;"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">B-Thrift Principles</h5>
                                <p class="mb-0 text-muted">Sustainability & Quality</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6?auto=format&fit=crop&q=80&w=800" 
                             alt="B-Thrift Office" 
                             class="img-fluid rounded shadow-sm border" 
                             style="height: 200px; width: 100%; object-fit: cover;">
                    </div>

                </div>
            </div>

            <div class="col-lg-8">
    <div class="card shadow border-0 p-5 h-100 d-flex align-items-center justify-content-center text-center" style="background: #fdfcfb;">
        <div>
            <h1 style="color: #a27b5e; font-weight: 800; font-size: 3rem;">B-Thrift</h1>
            <p class="lead text-muted">Pre-loved items, New-found joy.</p>
            <hr style="width: 50px; margin: 20px auto; border-top: 3px solid #a27b5e;">
            <p class="px-lg-5">
                B-Thrift is a dedicated marketplace for students at Mahallah Bilal. 
                Our mission is to promote a circular economy by making thrifting accessible, 
                affordable, and sustainable for the IIUM community.
            </p>
            <div class="mt-4">
                <span class="badge rounded-pill p-2 px-3 me-2" style="background-color: #a27b5e;">Sustainability</span>
                <span class="badge rounded-pill p-2 px-3 me-2" style="background-color: #a27b5e;">Community</span>
                <span class="badge rounded-pill p-2 px-3" style="background-color: #a27b5e;">Affordability</span>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</section>

@if(session('message_sent'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        title: 'Success!',
        text: "{{ session('message_sent') }}",
        icon: 'success',
        confirmButtonColor: '#a27b5e'
    });
</script>
@endif
@endsection