<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap') }}"
        rel="stylesheet">
    <title></title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
</head>
@include('front-end.navbar')
<body class="body">
    <div class="container mt-auto p-2 ">
        <div class="card">
            <div class="container-fluid mt-20 ">
                <div class="wrapper row">
                    <div class="preview col-md-6">
    
                        <div class="preview-pic tab-content">
                            <div class="img-1" ><img src="/storage/tailor-image/{{ $tailor->image }}"
                                 height="300" width="300"  /></div>
                        </div>
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{ $tailor->name }}</h3>
                        <h6 class="mb-2 mt-2">Average rating: <span id="span">{{ $avg_rating }}</span></h6>
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" id="tailor_id" name="tailor_id" value="{{ $tailor->id }}">
                        <p class="product-description">{!! $tailor->description !!}</p>
                        <h6 class="price">Specialist: {{ $tailor->specialist }}</h6>
                        <h6 class="price">Exerience: {{ $tailor->experience }}</h6>
                        @if ($user_exist)
                            <label for="rating" class="mt-2">Rate this tailor</label>
                            <select id="rating" class="form-control mb-5" name="rating">
                                @if (!$rating)
                                    <option value="" disabled selected>Place a rating</option>
                                    <option value="1"> &#9733;</option>
                                    <option value="2"> &#9733; &#9733;</option>
                                    <option value="3"> &#9733; &#9733; &#9733;</option>
                                    <option value="4"> &#9733; &#9733; &#9733; &#9733;</option>
                                    <option value="5"> &#9733; &#9733; &#9733; &#9733; &#9733;</option>
                                @else
                                    <option value="1" @if ($rating->rating == 1) selected @endif> &#9733;
                                    </option>
                                    <option value="2" @if ($rating->rating == 2) selected @endif>&#9733; &#9733;
                                    </option>
                                    <option value="3" @if ($rating->rating == 3) selected @endif>&#9733; &#9733;
                                        &#9733;
                                    </option>
                                    <option value="4" @if ($rating->rating == 4) selected @endif>&#9733; &#9733;
                                        &#9733; &#9733;
                                    </option>
                                    <option value="5" @if ($rating->rating == 5) selected @endif>&#9733; &#9733;
                                        &#9733;&#9733; &#9733;
                                    </option>
                                @endif
                            </select>
                        @endif
    
                        <div class=" mt-1 p-1 mb-2 ">
                            @if ($user_exist)
                                <button class=" btn btn-primary btn btn-sm float-right " type="submit">Please visit Our Tailor</button>
                            @else
                                <form action="{{ route('sendRequest') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <input type="hidden" name="eamil" value="{{ auth()->user()->email }}">
                                    <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="tailor_id" value="{{ $tailor->user->id }}">
                                    @if($cart_exist==true)
                                    @if($request_exist==false)
                                    <button class=" btn btn-primary btn btn-sm float-right mr-2" type="submit">Send
                                        Request</button>
                                    @endif
                                    @endif
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Additional Scripts -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    var user_id = document.getElementById('user_id').value;
    var tailor_id = document.getElementById('tailor_id').value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var rating = 0;
    $('#rating').change(function() {
        rating = $("#rating option:selected").val();
        $.ajax({
            url: "{{ route('add-rating') }}",
            type: 'POST',
            data: {
                user_id: user_id,
                rating: rating,
                tailor_id: tailor_id,
            },
        })
    });
</script>
