

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
      <th scope="col"><b>Product Image</b></th>
      <th scope="col" ><b>Product Name</b></th>
      <th scope="col"><b>Description</b></th>
      <th scope="col"><b>Price</b></th>
      <th scope="col"><b>Product Status</b></th>
      <th scope="col"><b>Action</th></th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $product)
    <tr>
      <td>
        <img src="/productimage/{{$product->image}}" 
            style="border: 1px solid black;
                   border-radius: 2px;
                   padding: 1px;
                   width: 150px; 
                   height: 100px;">
      </td>
      
      <td>{{$product->title}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->price}}</td>
     
     @if($product->quantity =="not available")
        <td> <span>Not Available</span></td>
      @else
        <td>{{$product->status}}</td>
      @endif
      
      <td>
        <a class="btn btn-primary" href="{{url('updateview', $product->id)}}"> Update</a>
        <a class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" href="{{url('deleteproduct' , $product->id)}}"> Delete</a>
      </td>
    </tr>
   @endforeach
  </tbody>

</table>
<div class="d-flex justify-content-center">
    {!! $data->links() !!} <!-- for paginate -->
</div>



      </div>
  </div>


	    @include('admin.script')       
       
  </body>
</html>