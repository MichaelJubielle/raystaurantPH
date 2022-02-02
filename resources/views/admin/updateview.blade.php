<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  	@include('admin.css')
<style type="text/css">
  body{
    background-color: black;
  }
  .title {
    color:whitel; 
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
  margin-top: 40px;
  background-color: gray;
  width: 400px;
  height: 750px;
   border: 2px solid whitesmoke;
  padding: 10px;
  border-radius: 25px;
</style>
  </head>
  <body>
      @include('admin.sidebar')


      @include('admin.navbar')

	  <div style="padding-bottom: 40px;" class="container-fluid page-body-wrapper">
     
      <div  class="container" align="center">
        
          <h1 class="title"> Update Product</h1>
          @if(session()->has('message')) <!-- for the notification-->
          <div class="alert alert-success">
            
            {{session()->get('message')}}
            <button type="button" class="close" data-dismiss="alert" style="float: right;"> x </button>
        
          </div>
          @endif




<form 
      method="post" 
      action="{{url('updateproduct' , $data->id)}}" 
      enctype="multipart/form-data">
      @csrf

          <div style="padding: 15px;">
            <label>Product Name:</label>  
            <input class="input" type="text" name="title" value="{{$data->title}}" required>
          </div>

          <div style="padding: 15px;">
            <label>Product Price:</label> 
            <input class="input" type="number" name="price" value="{{$data->price}}"  required>
          </div>

          <div style="padding: 15px;">
            <label>Description:</label> 
            <input class="input" type="text" name="description" value="{{$data->description}}" required>
          </div>

          <div style="padding: 15px;">
            <label>Product Status:</label>
            <input class="input" type="text" name="status" value="{{$data->status}}" required>
          </div>

          <div style="padding: 15px;">
            <label>Existing Image:</label>
            <img src="/productimage/{{$data->image}}" width="200" height="200">
          </div>


          <div style="padding: 15px;">
            <label>Replace Image:</label>
            <input  type="file" name="file" class="btn btn-primary">
          </div>

          <button type="submit" class="btn btn-success">Update</button>
      </div>
      </form>

</div>


	    @include('admin.script')       
       
  </body>
</html>