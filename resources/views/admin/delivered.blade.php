

<!DOCTYPE html>
<html lang="en">
  <head>
  	@include('admin.css')
<style type="text/css">
  
  tr, th, td {
    font-weight: bold;
  }

</style>
  </head>
  <body>
      @include('admin.sidebar')


      @include('admin.navbar')

	<div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper">
     
      <div  class="container" align="center">
<br>
  
  @if(session()->has('message')) <!-- for the notification-->
  <div class="alert alert-success">
            
            {{session()->get('message')}}
  <button type="button" class="close" data-dismiss="alert" style="float: right;"> x </button>
        
  </div>
  @endif

<br>

        <table class="table" style="background-color:black;">
  <thead>
    <tr>
      <th scope="col" ><b>Customer Name</b></th>
      <th scope="col" ><b>Customer Phone</b></th>
      <th scope="col" ><b>Delivery Address</b></th>
      <th scope="col" ><b>Product Name</b></th>
      <th scope="col"><b>Price</b></th>
      <th scope="col"><b>Quantity</b></th>
      <th scope="col"><b>Total</b></th>
      <th scope="col"><b>Status</b></th>
    </tr>
  </thead>
  <tbody>
  @foreach($order as $orders)
    <tr>
        <td>
          {{$orders->name}}
        </td>
        
        <td>
          {{$orders->phone}}
        </td>
        
        <td>
          {{$orders->address}}
        </td>


        <td>
          {{$orders->product_name}}
        </td>

        <td>
          {{$orders->price}}
        </td>
        
        <td>
          {{$orders->quantity}}
        </td>

        <td>
          {{$orders->total}}
        </td>

       

        <td>
          @if($orders->status =='delivered')
          <p>Done</p>
          @else
          <a href="{{url('updatestatus' ,$orders->id)}}" class="btn btn-primary">Delivered</a>
          @endif
        </td>
        
    </tr> 
   @endforeach
  </tbody>

</table>
<div class="d-flex justify-content-center">
    {!! $order->links() !!} <!-- for paginate -->
</div>



      </div>
  </div>


	    @include('admin.script')       
       
  </body>
</html>