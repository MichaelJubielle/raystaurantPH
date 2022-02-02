

 <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2 style="font-size: 40px;"> <span style="color:#FF4900; font-size: 40px;">Our </span> Menu</h2><br>
              <div style="margin-right: 950px;">
              <a><h2>Categories:</h2></a><br><br>
              <a href="{{url('redirect')}}"><h3>- All Menu</h3></a><br>
              <a href="{{url('burger')}}"><h3>- Burger</h3></a><br>
              <a href="{{url('chicken')}}"><h3>- Chicken</h3></a><br>
              <a href="{{url('drinks')}}"><h3>- Drinks</h3></a><br>
              <a href="{{url('add_on')}}"><h3>- Add-Ons</h3></a><br>
              <a href="{{url('dessert')}}"><h3>- Dessert</h3></a><br>
              <a href="{{url('side_menu')}}"><h3>- Side Menu</h3></a><br>
            </div>
      <form 
                class="form-inline" 
                style="float:right; 
                       padding: 10px;"
                       method="get"
                       action="{{url('search')}}" 
                       >

          <input type="search" name="search" class="form-control" placeholder="Search Here">
          <input type="submit" value="Search" class="btn btn-success">

      </form >
          


            </div>
          </div>
          @if(isset($data))
@foreach($data as $product)

          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="/productimage/{{$product->image}}" style="border: 2px solid black;height: 300px; width: 350px;"></a>
              <div class="down-content">
                <a href="#"><b><h4>{{$product->title}}</h4></b></a>
                <h6><b>₱ {{$product->price}}</b></h6>
                <h4>{{$product->description}}</h4>
                @if($product->status == 'not available')
                  <p>Not Available</p>
                @else
                <p>{{$product->status}}</p>
                @endif

                 @if($product->status == 'not available')
                 <p>--------------</p>
                 @else

        <form action="{{url('addcart' , $product->id)}}" method="POST">
                  @csrf
                  <input type="number" value="1" class="form-control" name="quantity" style="width: 100px;"> <br>
                  <input type="submit" class="btn btn-primary" value="Add Cart">
        </form>
        @endif
               
              </div>
            </div>
          </div>

@endforeach

  @if(method_exists($data, 'links'))
<div class="d-flex justify-content-center">
    {!! $data->links() !!} <!-- for paginate -->
</div>
  @endif

@endif

        </div>
      </div>
    </div>