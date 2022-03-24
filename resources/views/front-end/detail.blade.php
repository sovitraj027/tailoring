{{-- 
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
							
                        <div class="my-4">
						<p>{!!$cloth->description!!}</p></p>
						<h4 class="price">current price: <span>{{$cloth->price}}</span></h4>
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
					
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button">add to cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection 

	<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; 
      function clearField(t){                   
      if(! cleared[t.id]){                     
          cleared[t.id] = 1;  
          t.value='';        
          t.style.color='#fff';
          }
      }
    </script> --}}
    @include('front-end.style')

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <div class="card-wrapper">
            <div class="card">
                <!----card left----->
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">
                            <img src="/storage/cloth-image/{{ $cloth->image }}" width="70" height="400">
                            @foreach ($cloth->designs as $item) 
                            <img src="/storage/cloth-designs/{{ $item->image }}" width="150" height="200">
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="img-select">
                        <div class="img-item">
                            <a href="#" data-id="1">
                                <img src="/storage/cloth-image/{{ $cloth->image }}" width="70" height="400">
                            </a>
                        </div>
                    </div>
                    <div class="img-select">
                        <div class="img-item">
                            <a href="#" data-id="2">
                                @foreach ($cloth->designs as $item) 
                                <img src="/storage/cloth-designs/{{ $item->image }}" width="150" height="200">
                                @endforeach
                                </a>
                        </div>
                    </div>

                </div>
                <!------card-right---------->
                <div class="product-content">
                    <h2 class="product-title">{{$cloth->name}}</h2>
                </div>
                <div class="product-price">
                    <p class="last-price">Rs.<span>{{$cloth->price}}</span></p>
                </div>
                <div class="product-detail">
                    <h2>About this item:</h2>
                    <p>{!!$cloth->description!!} </p>
                </div>
                <ul>
                    <li>Available Colors: <span>  @foreach ($cloth->colors as $color)
                        <input type="color" id="head" name="head" value="{{$color->color}}">
                           @endforeach</span></li>
                           <li> Available fabrics:
                            @foreach ($cloth->categories as $category)
                                  <span class="size" data-toggle="tooltip" title="small">{{$category->name}}
                            @endforeach
                        </span> 
                            </li>
                </ul>
            </div>
            <div class="purcase-info">
                <input type="number" min="0" value="1">
                <button type="button" class="btn">
                    Add to cart <i class="fas fa-shopping-cart"></i>
                </button>
            </div>

        </div>
    </body>
    </html>
