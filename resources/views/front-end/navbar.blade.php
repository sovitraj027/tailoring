<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            {{-- <a class="navbar-brand" href="index.html"><h2>Mero <em>Tailor</em></h2></a> --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Tailors</a>
                    </li>

                    @if (!Auth::user())
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">log in</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @elseif(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endif
                    @if (Auth::user())
                        @if (Auth::user()->user_type == 3)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('myorder') }}">Cart </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('getMembership') }}">Membership</a>
                            </li>
                        @endif
                    @endif
                    @if (Auth::user())
                        <li class="nav-item">

                            <a class="nav-link" href="javascript:void" onclick="$('#logout-form').submit();">
                                LogOut
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>

                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<style>
    /*****************globals*************/
    img {
        max-width: 100%;
    }

    .tab-content img {
        width: 70%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
    }

    .body {
        background: #78746a
     
    }

    .card{
        margin-top: 30px;
        padding: 8em;
        line-height: 1.6rem;
        width: auto;
        background: #0d8d7c;
        border-style: dashed
    }
    .card-list{
        margin-top: 30px;
        padding: 8em;
        line-height: 1.6rem;
        width: auto;
        background: #0d8d7c
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


    

    .product-title,
    .rating,
    .product-description,
    .price,
    .vote,
    .sizes {
        margin-bottom: 10px;
    }

    .product-title {
        margin-top: 0;
    }

    .product-description {
        font-size: 20px;
        font-display: swap;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-style: inherit;
        color: rgb(16, 13, 13)
    }

    #rating {
        color: #fd9300
    }

    #span {
        color: #231e18
    }

    

</style>
