
@extends('layouts.app')
@push('inlinecss')
    {{-- <link href="{{asset('assets/css/authentication/form-1.css')}}" rel="stylesheet" type="text/css"/> --}}
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">

@endpush

@section('content')

    {{-- <x-breadcrumb parentPageTitle="All Users" parentPageUrl="{{ route('users.index') }}" currentPageTitle="Add new user">
    </x-breadcrumb> --}}

    <div class="card">
        <div class="card-header">
            <h2 class="lead text-center">Create a New User</h2>
        </div>
        <div class="card-body">

            <form action="{{ route('tailors.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

             
                <div id="password-field" class="field-wrapper input mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-lock">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <input id="password" name="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div id="confirm-password-field" class="field-wrapper input mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-lock">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    <input id="password-confirm" type="password" class="form-control"
                           name="password_confirmation" placeholder="Confirm Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
                <input type="hidden" name="user_type" id="user_type" value="2">

                <div class="d-sm-flex justify-content-between">
                    <div class="field-wrapper toggle-pass">
                        <p class="d-inline-block">Show Password</p>
                        <label class="switch s-primary">
                            <input type="checkbox" id="toggle-password" class="d-none">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                
                <button class="btn btn-primary" type="submit">Register</button>
            </form>

        </div>
    </div>

@endsection
@section('custom_js')

    @push('inlinejs')

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/authentication/form-1.js')}}"></script>
@endpush
@endsection
