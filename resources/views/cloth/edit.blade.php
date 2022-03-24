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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
@section('content')

    <form method="POST" action="{{route('clothes.update',$cloth->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-lg-8 layout-spacing layout-top-spacing px-5">



                <x-bread-crumb listRoute="{{route('clothes.index')}}" model="All Clothes" :item="'Create'"></x-bread-crumb>
                <div class="statbox widget box box-shadow">


                    <div class="widget-content widget-content-area">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error("name") is-invalid @enderror" name="name" id="name" value="{{$cloth->name}}">
                            @error("name")
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control @error("image") is-invalid @enderror" name="image" id="designImage" alt="image">
                            @if(!is_null($cloth->image))
                                <img id="showImagePreview" src="{{ asset('/storage/cloth-image/'.$cloth->image)}}" alt="design image preview" height="150px"
                                     width="250px">
                            @else
                                <img id="showImagePreview" src="#" alt="design image preview" height="150px" width="250px" style="display: none;">
                            @endif

                            @error("image")
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                      
               <div class="form-group mb-4">
                <label for="category_id"> Categories</label>
                <select type="text" class="selectpicker form-control @error('category_id') is-invalid @enderror" name="category_id[]" id="category_id" value="">
                
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ in_array($category->id,$selected_category)?'selected':''}}> {{$category->name}}</option>

                    @endforeach
                      
                </select>

                @error('category_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
           
                        <div class="form-group mb-4">
                            <label for="color_id"> Colors</label>
                            <select class="selectpicker form-control @error('color_id') is-invalid @enderror" name="color_id[]" id="color_id" value="{{$cloth}}">
                            
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                            </select>

                            @error('color_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="name">Brand</label>
                            <input type="text" class="form-control @error("brand") is-invalid @enderror" name="brand" id="brand" value="{{$cloth->brand}}">
                            @error("brand")
                            <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="type"> Cloth Type</label>
                            <select class="selectpicker form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{$cloth->type}}">
                                <option value="disabled" selected disabled>Enter Cloth Type</option>
       
                                    <option value="children">Childrens</option>
                                    <option value="Men">Men</option>
                                    <option value="women">Women</option>
                                    <option value="elder">Elders</option>
                              
                            </select>

                            @error('type')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                
                        <div class="form-group mb-4">
                            <label for="desc">Cloth Description *</label>
                            <textarea name="description" class="form-control content @error('description') is-invalid @enderror" id="desc" cols="30" rows="8" vbalue="{!!$cloth->description!!}">
                            </textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="price">Price</label>
                            <input type="number" class="form-control @error("price") is-invalid @enderror" name="price" id="price" value="{{$cloth->price}}">
                            @error("price")
                            <div class="invalid-feedback">{{$message}}</div>@enderror
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
            let siteImage = document.getElementById('designImage');
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
        $('#category_id').select2({
            multiple:true,
            placeholder: "Select a category",
            allowClear: true,
            tags: true,
            tokenSeparators: [',', ' ']
        });

        $('#color_id').select2({
            multiple:true,
            placeholder: "Select a color",
            allowClear: true,
            tags: true,
            tokenSeparators: [',', ' ']
        });
    </script>
@endpush
@endpush

