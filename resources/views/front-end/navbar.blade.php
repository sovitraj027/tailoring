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
                        <a class="nav-link" href="{{ route('about') }}">About us</a>
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
                    @if (Auth::user()->user_type==3)
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('myorder') }}">Cart </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('getMembership') }}">Membership</a>
                  </li> 
                    @endif
                    @endif   
                </ul>
            </div>
        </div>
    </nav>
</header>
