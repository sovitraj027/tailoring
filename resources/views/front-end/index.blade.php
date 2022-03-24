@extends('front-end.header')
@include('front-end.navbar')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h2>A Moments of Crafting Surprises</h2>
          </div>
        </div>
      
       
    </div>
    <!-- Banner Ends Here -->    
          <div class="products">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="filters">
                    <ul>
                        <li class="active" data-filter=""> <a href="{{route('allproducts')}}"> All</a></li>
                        <li data-filter=""> <a href="{{route('childrens')}}">childrens</a> </li>
                        <li data-filter=""> <a href="{{route('mens')}}">Mens</a> </li>
                        <li data-filter=""> <a href="{{route('womens')}}">Womens</a> </li>
                        <li data-filter=""> <a href="{{route('elders')}}">Elders</a> </li>
                    </ul>
                  </div>
                </div>
                
                @foreach ($clothes as $item)
                <div class="col-md-4">
                  <div class="product-item">
                    <a href="#"><img src="/storage/cloth-image/{{$item->image}}" alt=""width="150" height="400"></a>
                    <div class="down-content">
                      <a href="#"><h4>{{$item->name}}</h4></a>
                      <h6>Rs {{$item->price}}</h6>
                      <p>{!!$item->description!!}</p>
                      <span><a href="{{route('productDetail',$item->id)}}">more</a></span>
                    </div>
                  </div>
                </div>
                @endforeach      
               
      


    <!-- Bootstrap core JavaScript -->
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
    </script>


 
