<!-- Page Content -->
<style>
    /*****************globals*************/
    body {
        font-family: 'open sans';
        overflow-x: hidden;
    }

    img {
        max-width: 100%;
    }

    .preview {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px;
        }
    }

    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 20px;
    }

    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%;
    }

    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block;
    }

    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0;
    }

    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0;
    }

    .tab-content {
        overflow: hidden;
    }

    .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
    }

    .card {
        margin-top: 30px;
        background: rgb(122, 175, 134);
        padding: 5em;
        line-height: 1.0em;
    }

    @media screen and (min-width: 997px) {
        .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
        }
    }

    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .product-title,
    .price,
    .sizes,
    .colors {
        text-transform: UPPERCASE;
        font-weight: bold;
    }

    .checked,
    .price span {
        color: #ff9f1a;
    }

    .product-title,
    .rating,
    .product-description,
    .price,
    .vote,
    .sizes {
        margin-bottom: 15px;
    }

    .product-title {
        margin-top: 0;
    }

    .size {
        margin-right: 10px;
    }

    .size:first-of-type {
        margin-left: 40px;
    }

    .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px;
    }

    .color:first-of-type {
        margin-left: 20px;
    }

    .add-to-cart,
    .like {
        background: #ff9f1a;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        -webkit-transition: background .3s ease;
        transition: background .3s ease;
    }

    .add-to-cart:hover,
    .like:hover {
        background: #b36800;
        color: #fff;
    }

    .not-available {
        text-align: center;
        line-height: 2em;
    }

    .not-available:before {
        font-family: fontawesome;
        content: "\f00d";
        color: #fff;
    }

    .orange {
        background: #ff9f1a;
    }

    .green {
        background: #85ad00;
    }

    .blue {
        background: #0076ad;
    }

    .tooltip-inner {
        padding: 1.3em;
    }

    @-webkit-keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3);
        }

        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    @keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
            transform: scale(3);
        }

        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }
    }

    /*# sourceMappingURL=style.css.map */

</style>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap')}}" rel="stylesheet">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-sixteen.css')}}">
    <link rel="stylesheet"  href="{{asset('assets/css/owl.css')}}">

  </head>
@include('front-end.navbar')
    <div class="container ">
        <div class="card mt-5">
            <div class="container-fluid mt-5">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="/storage/tailor-image/{{ $tailor->image }}"
                                    height="300" width="100" /></div>

                        </div>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">men's shoes fashion</h3>
                        <h5 class="mb-2">Average rating:{{$avg_rating}}</h5>
                        <label for="rating" class="">How would rate this place ?</label>
                        <select id="rating" class="form-control mb-5" name="rating">

                            @if(!$rating)
                            <option value="" disabled selected>Place a rating</option>
                            <option value="1"> &#9733;</option>
                            <option value="2"> &#9733; &#9733;</option>
                            <option value="3"> &#9733; &#9733; &#9733;</option>
                            <option value="4"> &#9733; &#9733; &#9733; &#9733;</option>
                            <option value="5"> &#9733; &#9733; &#9733; &#9733; &#9733;</option>
                        @else
                            <option value="1" @if($rating->rating == 1) selected @endif> &#9733;
                            </option>
                            <option value="2" @if($rating->rating == 2) selected @endif>&#9733; &#9733;
                            </option>
                            <option value="3" @if($rating->rating == 3) selected @endif>&#9733; &#9733;
                                &#9733;
                            </option>
                            <option value="4" @if($rating->rating == 4) selected @endif>&#9733; &#9733;
                                &#9733; &#9733;
                            </option>
                            <option value="5" @if($rating->rating == 5) selected @endif>&#9733; &#9733;
                                &#9733;&#9733; &#9733;
                            </option>
                        @endif
                        </select>
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" id="tailor_id" name="tailor_id" value="{{ $tailor->id }}">


                        <p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium
                            cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                        <h4 class="price">current price: <span>$180</span></h4>
                        <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(
                                votes)</strong></p>


                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="button">Chat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Additional Scripts -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script>
  var user_id = document.getElementById('user_id').value;
  var tailor_id = document.getElementById('tailor_id').value;

  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    var rating = 0;
        $('#rating').change(function () {
            rating = $("#rating option:selected").val();
            $.ajax({
                url: "{{route('add-rating')}}",
                type: 'POST',
                data: {
                    user_id: user_id,
                    rating: rating,
                    tailor_id: tailor_id,
                },
            })
        });
</script>
