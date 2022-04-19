@extends('front-end.header')
@include('front-end.navbar')

  
@include('cloth.header')
@include('cloth.style.detail')


<section>
   <div class="container">
        <div class="col-lg-8 border p-3 main-section bg-white">
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
        <a href="{{route('welcome')}}" class="float-right">back</a>  
        </div>

        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">
                 <div class="xzoom" id="image-1"><img src="/storage/cloth-image/{{ $cloth->image }}" xl width="20" height="300" class="border p-3"  data-zoom-image="large//storage/cloth-image/{{ $cloth->image }}"></div>
                <span class="sub-img">
                @foreach ($cloth->designs as $item) 
                <img src="/storage/cloth-designs/{{ $item->image }}"class="xzoom-1"  height="500" width="100">
                @endforeach
                </span>
        </div>
             <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                      <div class="row">
                            <div class="col-lg-12">
                            <p class="m-0 p-0">{{$cloth->name}}</p>
                            </div>
                            <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro">${{$cloth->price}}</p>
                            <hr class="p-0 m-0">
                            </div>
                            <div class="col-lg-12 pt-2">
                                <h5>description</h5>
                                <p>{!!$cloth->description!!}</p><hr class="m-0 pt-2 mt-2">
                            </div>
                             <div class="col-lg-12">
                            <p class="tag-section"><strong>Brand : </strong>{{$cloth->brand}}</p>

                            <form action="{{route('addToCart',$cloth->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h5 class="colors">Fabric:
                                    @foreach ($cloth->categories as $category)
                                    <input type="radio" id="contactChoice1"
                                    name="category_id" value="{{$category->id}}">
                                <label for="category_id">{{$category->name}}</</label>
                             
                                    @endforeach
                                </h5>
                             
                                </div>
                                <div class="col-lg-12">
                                    <h6>Quantity :</h6>
                                    <input type="number" class="form-control text-center w-100" name="quantity">
                                    @error('quantity')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mt-3">
                                <div class="row">
                                <div class="col-lg-6 pb-2">
                                    <button class="btn btn-danger w-100" type="submit" >Add To Cart</button>
                                </div>
                             </form>
                         </div>
                    </div>
                </div>
              </div>
           </div>
        </div>
   
</section>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<script>
$(function(){
 $(".xzoom").xzoom({
     zoomWidth: 400,
     tint:'#333',
     Xoffset:15;
 });
});
</script>
