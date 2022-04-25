

@extends('front-end.header')
@include('front-end.navbar')
<style>
    
  
</style>
@foreach ($tailors as $item)
    <body class="body">
        <div class="container mt-auto p-2">
            <div class="card-list  border-primary" >
                <div class="container-fliud mt-20 mb-10 ">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img
                                        src="/storage/tailor-image/{{ $item->image }}" height="300" width="100" />
                                </div>
                            </div>
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">{{ $item->name }}</h3>
                            <h5 class="price">Location: <span>{{ $item->location }}</span></h5>
                            <h5 class="price">Contact: <span>{{ $item->phone }}</span></h5>
                            <div class="">
                                <button class=" btn-sm btn btn-dark" type="button"><a
                                        href="{{ route('viewDetail', $item->id) }}">More</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endforeach

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
