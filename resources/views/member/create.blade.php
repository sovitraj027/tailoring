@extends('front-end.header')
@include('front-end.navbar')

     <!-- Page Content -->
     <div class="page-heading contact-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
            
              <h2>Get 20% Discount on every product</h2>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <div class="find-us">
      <div class="container">
          <div class="col-md-8">
            <div class="contact-form">
              <form  action="{{route('addMember')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="address" type="text" class="form-control" id="" placeholder="Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="mobile" type="number" class="form-control" id="number" placeholder="Mobile number" required="">
                    </fieldset>
                  </div>
                 
                  <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">

                  <input type="hidden" name="status" id="status" value="0">

                  <div class="col-lg-12 ">
                    <fieldset>
                      <button type="submit" id="form-submit" class="btn btn-primary">Apply</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
