@extends('layouts.app')

@push('inlinecss')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <style>
        .note-editable, .note-toolbar {
            background-color: #1b2e4b !important;
            color: white !important;
        }

        .note-btn {
            background-color: #0e1726 !important;
            color: white !important;
        }
    </style>
@endpush

@section('content')

    <form method="POST" action="{{isset($tailor_profile) ? route('tailor_profile.update') : route('tailor_profile.store')}}"
          enctype="multipart/form-data">
        @csrf

        @if(isset($tailor_profile))
            @method('PATCH')
        @endif

        <div class="row">
            <div class="col-lg-8 layout-spacing layout-top-spacing px-5">

                <x-bread-crumb model="Create Tailor Profile"></x-bread-crumb>

                <div class="statbox widget box box-shadow">

                    <x-widget-header :item="'Create'" model="Company Profile"></x-widget-header>

                    <div class="widget-content widget-content-area">

                        <div class="form-group mb-4">
                            <label for="image">Image</label>
                            <input type="file" class="form-control @error("image") is-invalid @enderror" name="image" id="image" alt="image">
                            <img id="showImagePreview" src="#" alt="avatar preview" height="150px" width="250px">

                            @if(isset($customer_profile) && !is_null($customer_profile->image))
                                <img id="showImagePreview" src="{{ asset('storage/tailor-image/'.$customer_profile->image)}}" alt="taillor image preview" height="150px"
                                     width="250px">
                            @else
                                <img id="showImagePreview" src="#" alt="tailor image preview" height="150px" width="250px" style="display: none;">
                            @endif

                            @error("image")
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="Name">Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="Name" name="name"
                                   value="{{auth()->user()->name ?? old('name')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="Phone">Phone *</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="Phone" name="phone"
                                       value="{{isset($tailor_profile)?$tailor_profile->phone : old('phone')}}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="Location">Location *</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" id="Location" name="location"
                                   value="{{isset($tailor_profile)? $tailor_profile->location : old('location')}}">
                            @error('location')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="specialist">Specialist *</label>
                            <input type="text" class="form-control @error('specialist') is-invalid @enderror" id="specialist" name="specialist"
                                   value="{{isset($tailor_profile)? $tailor_profile->specialist : old('specialist')}}">
                            @error('specialist')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="experience"> Experience </label>
                            <select class="selectpicker form-control @error('experience') is-invalid @enderror" name="experience" id="experience"
                            value="{{isset($tailor_profile)? $tailor_profile->experience : old('experience')}}">
                                <option value="disabled" selected disabled>Enter Your Experience</option>
                                    <option value="OneYear">One Year</option>
                                    <option value="TwoYears">Two Years</option>
                                    <option value="ThreeYears">Three Years</option>
                                    <option value="FourYears">Four Years</option>
                                    <option value="FiveYears">Five Years</option>
                                    
                            </select>
                            @error('experience')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>   
                        <div class="form-group mb-4">
                            <label for="desc">Tailor's Description *</label>
                            <textarea name="description" class="form-control content @error('description') is-invalid @enderror" id="desc" cols="30" rows="8"
                            value="{{isset($tailor_profile)? $tailor_profile->description : old('description')}}">
                                {{-- {{isset($tailor_profile)? $tailor_profile->description : old('description')}} --}}
                            </textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
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


@push('inlinejs')
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $('#desc').summernote({
            height: 100
        });
    </script>

    <script>
        
        window.onload = function () {

            // to display image preview
            let siteImage = document.getElementById('avatar');
            let showImagePreview = document.getElementById('showImagePreview');
            showImagePreview.style.display = "none";

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

