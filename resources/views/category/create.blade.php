@extends('layouts.app')

@section('content')

    <form method="POST" action="{{route('categories.store')}}">
        @csrf

        <div class="row">
            <div class="col-lg-8 layout-spacing layout-top-spacing px-5">

                <x-bread-crumb listRoute="{{route('categories.index')}}" model="Category" :item="'Create'"></x-bread-crumb>

                <div class="statbox widget box box-shadow">

                    <x-widget-header :item="'Create'" model="Category"></x-widget-header>

                    <div class="widget-content widget-content-area">

                        <div class="form-group mb-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error("name") is-invalid @enderror" name="name" id="name" value="{{old('name')}}">
                            @error("name")
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
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
                        <button type="submit" class="btn btn-sm btn-primary mt-3">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
