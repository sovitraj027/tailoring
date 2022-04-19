
@include('order.myorderstyle')


<div class="container mt-5 mb-5">
  <div class="d-flex justify-content-center row">
      <div class="col-md-8">
          <div class="p-2">
              <h4>My carts</h4>
              {{-- <div class="d-flex flex-row align-items-center pull-right"><span class="mr-1">Sort by:</span><span class="mr-1 font-weight-bold">Price</span><i class="fa fa-angle-down"></i></div> --}}
          </div>
       
         @forelse ($clothes as $cloth)
             <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
              <div class="mr-1"><img class="rounded" src="/storage/cloth-image/{{ $cloth->image }}" width="70"></div>
              <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold">{{$cloth->name}}</span>
                  <div class="d-flex flex-row product-desc">
                      {{-- <div class="size mr-1"><span style="color:red;font-weight:bolder">Quantity:</span><span class="font-weight-bold">&nbsp;</span></div> --}}
                      <div class="color"><span style="color:red;font-weight:bolder">fabric:</span><span class="font-weight-bold">&nbsp;{{$cloth->cart->category->name}}</span></div>
                          
                  </div>
              </div>
              <div class="d-flex flex-row align-items-center qty">
                  <h5 style="color:red;font-weight:bolder" class=" mt-1 mr-1 ml-1">{{$cloth->cart->quantity}}</h5>
              </div>
              <div>
                  <h5 style="color:rgb(111, 111, 220);font-weight:bolder">Rs {{$cloth->price*$cloth->cart->quantity}}</h5>
              </div>
              <div class="d-flex align-items-center">
                
                <form action="{{route('removeCart',$cloth->cart->id)}}" method="POST">
                  @csrf
                
                  <button
                          onclick="return confirm('Are you sure you want to delete this item?');"
                          class="btn btn-outline-danger btn-sm" type="submit" title="Delete">
                          <i class="fa fa-trash mb-1 text-danger"></i>
                  </button>
              </form></div>
          </div>
         <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button class="btn btn-secondary btn-block btn-lg ml-2 pay-button" type="button"> <a href="{{route('welcome')}}" style="color:rgb(193, 23, 29);font-weight:bolder" >Back To Shop</a> </button></div>

          {{-- <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text" class="form-control border-0 gift-card" placeholder="discount code/gift card"><button class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div> --}}
          <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button></div>
        </div>
        @empty
        <td>No item </td>
        @endforelse 
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


 
