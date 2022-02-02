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
              <li class="nav-item">
                <a class="nav-link" href="{{url('/redirect')}}">Menu
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
                            

               @if (Route::has('login'))

                    @auth
                    <li class="nav-item active">
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

<div style="padding: 100px;">
  
    <h1 style="font-size: 35px;">Order Summary</h1> <br>
        <table class="table" >
  <thead>
    <tr>
     
      <th scope="col" ><b>Product Name</b></th>
      <th scope="col"><b>Price</b></th>
      <th scope="col"><b>Quantity</b></th>
      <th scope="col"><b>Total</b></th>
      <th scope="col"><b>Action</th></th>
    </tr>
  </thead>
  <tbody>
    <form action="{{url('order')}}" method="POST">
      @csrf
    @foreach($cart as $carts)
    <tr>
        <td>
          <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden>
          {{$carts->product_title}}
        </td>

        <td>
          <input type="text" name="price[]" value="{{$carts->price}}"hidden>
          {{$carts->price}}
        </td>
        
        <td>
          <input type="text" name="quantity[]" value="{{$carts->quantity}}"hidden>
          {{$carts->quantity}}
        </td>

        <td>
          <input type="text" name="total[]" value="{{$carts->total}}"hidden>
          {{$carts->total}}
        </td>
        <td>
        
        <a class="btn btn-danger" href="{{url('delete' , $carts->id)}}"> Remove</a>
      </td>

    </tr> 
    @endforeach
  </tbody>

</table>
<hr>
Items: <input type="text" name="items" value="{{$count}}" readonly style="width: 50px;border: none;">

<div style="margin-left:900px;">
  PHP<input type="text" name="items" value="{{$total}}" readonly style="width: 100px; border: none;">
  </div>
 @if($count == '0')
 <center>
<h1>Cart is Empty</h1>
</center>
 
 @else
  Contact No: <input type="number" maxlength="11" name="phone"  required><br><br>
  Address: <input type="text" name="address"  required style="width: 500px; height: 150px;">


  <br><br>

  <button style="margin-left:500px;" class="btn btn-primary">Comfirm Order</button>
  @endif
  </form>
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
