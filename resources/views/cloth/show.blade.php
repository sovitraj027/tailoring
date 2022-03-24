@extends('layouts.app')
@include('cloth.style.style')
@section('content')
<x-bread-crumb listRoute="{{route('clothes.index')}}" model="clothes" :item="'show'"></x-bread-crumb>
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="/storage/cloth-image/{{ $cloth->image }}" width="70" height="400"></div>
						
                        
						</div>
                        <div class="my-4">
                            <h5 class="sizes">Designs:		
                            </h5>
                        </div>
                        
                       
                        <div class="img_container ">
                            
                                @foreach ($cloth->designs as $item) 
                            <img src="/storage/cloth-designs/{{ $item->image }}" width="150" height="200">
						
                            @endforeach
                            
                          </div>
                   
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$cloth->name}}</h3>
						<div class="rating">
							{{-- <div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div> --}}
							{{-- <span class="review-no">41 reviews</span> --}}
						</div>
                        <div class="my-4">
						<p>{!!$cloth->description!!}</p></p>
						<h4 class="price">current price: <span>{{$cloth->price}}</span></h4>
						{{-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> --}}
						<h5 class="sizes">Cloth Type:
							<span class="size" data-toggle="tooltip" title="small">{{$cloth->type}}</span>
							
						</h5>
                        <h5 class="sizes">Brand:
							<span class="size" data-toggle="tooltip" title="small">{{$cloth->brand}}</span>
							
						</h5>
          
                            
                        <h5 class="colors">Fabric:
                            @foreach ($cloth->categories as $category)
                            <span class="size" data-toggle="tooltip" title="small">{{$category->name}}</span>
                            @endforeach
						</h5>
                    
                            <h5 class="colors">colors:
                                @foreach ($cloth->colors as $color)
                                <input type="color" id="head" name="head" value="{{$color->color}}">
                                @endforeach
                            </h5>
                            
                        </div>
					
						{{-- <div class="action">
							<button class="add-to-cart btn btn-default" type="button">add to cart</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection