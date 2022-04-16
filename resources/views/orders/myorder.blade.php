@extends('front-end.header')
@include('front-end.navbar')
   <!-- Page Content -->
    <div class="">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
            
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Your orders</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="/storage/tailor-image/" alt=""width="50" height="50">
                {{-- <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                  </div>
                </div> --}}
              </div> 
              <div class="down-content">
                {{-- <h4>{{$tailor->name}}</h4>
                <span>{{$tailor->experience}} Experienced</span>
                <span>{{$tailor->location}}</span>
                <span>{{$tailor->phone}}</span>
                <p>{!!$tailor->description!!}</p> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
          {{-- @endforeach       --}}
    </div>
   
  

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
