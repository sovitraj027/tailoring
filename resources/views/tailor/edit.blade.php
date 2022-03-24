@extends('layouts.app')
@push('inlinecss')
    {{-- <link href="{{asset('assets/css/authentication/form-1.css')}}" rel="stylesheet" type="text/css"/> --}}
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}">

@endpush
@section('content')

    <form method="POST" action="{{route('tailors.update',$tailor->id)}}">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-lg-8 layout-spacing layout-top-spacing px-5">

                <x-bread-crumb listRoute="{{route('tailors.index')}}" model="Tailor" :item="'Update'"></x-bread-crumb>

                <div class="statbox widget box box-shadow">

                    <x-widget-header :item="'Update'" model="Tailor"></x-widget-header>

                    <div class="widget-content widget-content-area">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error("name") is-invalid @enderror" name="name" id="name" value="{{$tailor->name}}">
                            @error("name")
                            <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$tailor->email}}">
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
                        
        
                        <div class="d-sm-flex justify-content-between">
                            <div class="field-wrapper toggle-pass">
                                <p class="d-inline-block">Show Password</p>
                                <label class="switch s-primary">
                                    <input type="checkbox" id="toggle-password" class="d-none">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 layout-top-spacing px-5">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Actions</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <button type="submit" class="btn btn-sm btn-primary mt-3">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('custom_js')

    @push('inlinejs')

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/authentication/form-1.js')}}"></script>
@endpush
@endsection
