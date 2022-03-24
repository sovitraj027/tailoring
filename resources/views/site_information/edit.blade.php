@extends('layouts.app')

@section('content')

    <form method="POST" action="{{route('site-informations.update', $site_information->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-lg-8 layout-spacing layout-top-spacing px-5">

                <x-bread-crumb model="Update SiteInformation"></x-bread-crumb>

                <div class="statbox widget box box-shadow">

                    <x-widget-header :item="'Update'" model="SiteInformation"></x-widget-header>

                    <div class="widget-content widget-content-area">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error("name") is-invalid @enderror" name="name" id="name" value="{{$site_information->name}}">
                            @error("name")
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control @error("image") is-invalid @enderror" name="image" id="siteImage" alt="image">
                            @if(!is_null($site_information->image))
                                <img id="showImagePreview" src="{{ asset('storage/site-info-image/'.$site_information->image)}}" alt="site image preview" height="150px"
                                     width="250px">
                            @else
                                <img id="showImagePreview" src="#" alt="site image preview" height="150px" width="250px" style="display: none;">
                            @endif

                            @error("image")
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

                        <button type="submit" class="btn btn-sm btn-primary mt-3">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('inlinejs')
    <script>
        window.onload = function () {

            // to display image preview
            let siteImage = document.getElementById('siteImage');
            let showImagePreview = document.getElementById('showImagePreview');
            //showImagePreview.style.display = "none";

            siteImage.onchange = evt => {
                const [file] = siteImage.files
                if (file) {
                    showImagePreview.style.display = "block";
                    showImagePreview.src = URL.createObjectURL(file);
                    showImagePreview.onload = function () {
                        URL.revokeObjectURL(showImagePreview.src) // free memory
                    }
                }
            }
        };
    </script>
@endpush

