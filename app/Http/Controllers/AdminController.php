<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // add this method for model
use App\Models\Order; // add this method for model
use Illuminate\Support\Facades\Auth; //import for authentication

class AdminController extends Controller
{
    
    public function product() //view of product
        {
            if(Auth::id())
            {
                if(Auth::user()->user_type=='1')
                {                    
                    return view('admin.product');
                }
                else
                {
                    return redirect()->back();
                }
            }
            else{
                return redirect('login');
            }
        }

    

    public function uploadproduct(Request $request) //requesting to a form in product file
        {
            $data =new product; //insert to this db

            $image=$request->file; // request in input name file

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->file->move('productimage', $imagename); // save to folder with filename

            $data->image=$imagename;
            //format: table colum = input name
            $data->title=$request->title;
            $data->price=$request->price;
            $data->description=$request->description;
            $data->status=$request->status;

            $data->save(); //insert to tbl

            return redirect('showproduct')->with('message', 'Product Successfully Added!');
        }

         

    public function showproduct() //view list of product
        {
            
            $data = product::paginate(8); // show first 5 items in the list 


            return view('admin.showproduct', compact('data'));
        }



    
    public function deleteproduct($id) //delete prod using id function
        {

            $data=product::find($id);

            $data->delete();

            return redirect()->back()->with('message', 'Product Deleted Successfully!');
        }


    

    public function updateview($id) // show item to update
        {
            $data=product::find($id);

            return view('admin.updateview' , compact('data'));
        }


    

    public function updateproduct(Request $request, $id) // update function
        {
            $data=product::find($id);

            $image=$request->file; // request in input name file

            if($image)
                { 
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->file->move('productimage', $imagename); // save to folder with filename

            $data->image=$imagename;
                }

            //format: table colum = input name
            $data->title=$request->title;
            $data->price=$request->price;
            $data->description=$request->description;
            $data->status=$request->status;

            $data->save(); //insert to tbl

            return redirect()->back()->with('message', 'Product Updated Successfully!');
        }


        public function showorder()
        {
            $order = order::where('status' , '=' , 'not delivered')->paginate(10); // show first 5 items in the list 


            return view('admin.showorder', compact('order'));

        }



        public function updatestatus($id)
        {
            $order=order::find($id);

            $order->status='delivered';

            $order->save();

            return redirect()->back()->with('message', 'Order Delivered!');

        }


        public function delivered()
        {
            $order = order::where('status' , '=' , 'delivered')->paginate(10); // show first 10 items in the list 


            return view('admin.delivered', compact('order'));

        }

}



