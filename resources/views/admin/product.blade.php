

<!DOCTYPE html>
<html lang="en">
  <head>
  	
  	@include('admin.css')
<style type="text/css">
	body{
		background-color: black;
	}
	.title {
		color:white; 
		padding-top: 25px; 
		font-size: 40px;
	}
	.input{
		color: black;
	}
	label{
		display: inline-block;
		width: 200px;
	}
	.container {
	margin-top: 50px;
  background-color: gray;
  width: 400px;
  height: 700px;
   border: 2px solid whitesmoke;
  padding: 10px;
  border-radius: 25px;
 
}
</style>
  </head>
  <body>
      @include('admin.sidebar')


      @include('admin.navbar')
<div class="container-fluid page-body-wrapper" style="padding-bottom: 30px;"> 
     
      <div  class="container" align="center">
      	
         	<h1 class="title"> Add Product</h1>
  				@if(session()->has('message')) <!-- for the notification-->
  				<div class="alert alert-success">
  					
  					{{session()->get('message')}}
  					<button type="button" class="close" data-dismiss="alert" style="float: right;"> x </button>
  			
  				</div>
  				@endif




<form method="post" action="{{url('uploadproduct')}}" enctype="multipart/form-data">
	@csrf
         	<div style="padding: 15px;">
         		<label>Product Name:</label>	
         		<input class="input" type="text" name="title" placeholder="Product Name" required>
         	</div>

         	<div style="padding: 15px;">
         		<label>Product Price:</label>	
         		<input class="input" type="number" name="price" placeholder="Product Price" required>
         	</div>

         	<div style="padding: 15px;">
         		<label>Description:</label>	
         		<input class="input" type="text" name="description" placeholder="Product Description" required>
         	</div>

         	<div style="padding: 15px;">
         		<label>Product Status:</label>
         		<input class="input" type="text" name="status" placeholder="Product status" required>
         	</div>

         	<div style="padding: 15px;">
         		<label>Product Image:</label>
         		<input  type="file" name="file" class="btn btn-primary">
         	</div>

         	<input type="submit" class="btn btn-success">
         	
      </div>
      </form>

</div>


	    @include('admin.script')       
       
  </body>
</html>