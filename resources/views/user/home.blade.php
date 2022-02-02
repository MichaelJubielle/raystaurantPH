<!--test for github -->
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Raystaurant PH</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<style type="text/css">
    input[type=submit]{
      color: black;
    }
</style>
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href=""><h2>Raystaurant <em>PH</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="">Menu
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              
              

               @if (Route::has('login'))

                    @auth
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('showcart')}}">
                      <i class="fas fa-shopping-cart"></i> 
                      Cart[{{$count}}]</a>
                    </li>

                     <li class="nav-item">
                <a class="nav-link" href="{{url('transaction')}}">Transaction</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{url('history')}}">History</a>
              </li>
                   
                    	<div style="margin-right: -300px;">
                      <x-app-layout>
                      		<!-- user setting and the logout-->
					           </x-app-layout>
                      </div>

                    @else


  
           <li>
        	  <a href="{{ route('login') }}" class="nav-link"> Log in</a>
            </li>
                            @if (Route::has('register'))

          	<li>
            <a href="{{ route('register') }}" class="nav-link"> Register</a>
            </li>
   
                        @endif
                    @endauth
             
            @endif


            </ul>
          </div>
        </div>
      </nav>
       @if(session()->has('message')) <!-- for the notification-->
          <div class="alert alert-success">
            
            {{session()->get('message')}}
            <button type="button" class="close" data-dismiss="alert" style="float: right;"> x </button>
        
          </div>
          @endif
    </header>

    
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Of</h4>
            <h2>Raystaurant PH</h2>
          </div>
        </div>
        
       
      </div>
    </div>
    <!-- Banner Ends Here -->

   @include('user.product')

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2022 Raystaurant PH.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>


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
