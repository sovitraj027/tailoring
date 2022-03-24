<!--  BEGIN NAVBAR  -->

<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm expand-header">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <ul class="navbar-item flex-row ml-auto">
            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-user-check">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <polyline points="17 11 19 13 23 9"></polyline>
                    </svg>
                </a>
                <div class="dropdown-menu position-absolute e-animated e-fadeInUp"
                     aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">

                            <img class="img-fluid mr-2"
                                 alt="avatar"
                                 src="{{asset('assets/img/1.jpg') }}">

                            {{-- <img src="{{auth()->user()->image ?? asset('assets/img/1.jpg')}}" class="img-fluid mr-2"
                                 alt="avatar"> --}}
                            <div class="media-body">
                                <h5>{{auth()->user()->name}}</h5>
                                {{-- <p>Web Developer</p> --}}
                            </div>
                        </div>
                    </div>
                    @if(auth()->user()->user_type == 1)
                    <div class="dropdown-item">
                    
                            <a href="{{route('tailor_profile', auth()->user()->name)}}">
                             
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span>My Profile</span>
                                    </a>
                    </div>
                    @endif
                    <div class="dropdown-item">
                        <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span>Log Out</span>
                        </a>
                        <form id="logout-form" method="post" action="{{ route('logout') }}">
                            @csrf
                            @method('POST')
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>


<!--  END NAVBAR  -->

@push('inlinejs')
    <script>
        $(document).ready(function () {
            $('.marky_mark').next('a').hide();
            $('.marky_mark').click(function (e) {
                e.preventDefault()
                var a_current = $(this).attr('href');
                var a_next = $(this).next('a').attr('href');

                $.ajax({
                    url: a_current,
                    type: 'GET',
                    success: function (data) {
                        window.location.href = a_next
                        $(this).next('a').show()
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            })
        });
    </script>
@endpush
