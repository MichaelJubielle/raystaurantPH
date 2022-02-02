<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //import for authentication
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
class HomeController extends Controller
{
    
    public function redirect() //if admin or user
    {
        $user_type=Auth::user()->user_type; //getting user_type


        if($user_type=='1')
        {

            return view('admin.home'); //admin
        }
        else
        {
           
            $data = product::paginate(6); //show all data in db by 3
            $user=auth()->user();
            $count=cart::where('user_id' , $user->id)->count(); //count in tbl by id
            return view('user.home', compact('data' , 'count')); // user
        }
    }



        public function index() // show both index
            {

            if(Auth::id())
            {

                return redirect('redirect'); //remain to same page of admin
            }
            else {
                $data = product::paginate(6); //show all data in db by 3

            return view('user.home', compact('data')); // user
           
            }
        }


        public function search(Request $request) //search function
        {
        $user=auth()->user();
        

        if(Auth::id())
            {   
                $count=cart::where('user_id' , $user->id)->count(); //count in tbl by id
                $search=$request->search; //input name
            if($search=='')
            {
                $data = product::paginate(6); //show all data in db by 3

                 return view('user.home', compact('data' , 'count')); // user
            }
            else{
                $data=product::where('title', 'like' , '%'.$search. '%')->get(); //search

                return view('user.home' , compact('data' , 'count'));
                }
            }
            else
            {
                $search=$request->search; //input name
                $data=product::where('title', 'like' , '%'.$search. '%')->get();
                return view('user.home' , compact('data'));
                //return redirect()->back();
            }
        }


        public function addcart(Request $request, $id) // add cart function
        {
                 if(Auth::id())
                 {
                    $user=auth()->user(); //specific user
                    $product=product::find($id); // specific prod by id
                    $cart= new cart;

                        $cart->name=$user->name;  //name from user to cart
                        $cart->user_id=$user->id; //id 
                        $cart->phone=$user->phone;  //name from user to cart
                        $cart->address=$user->address;  //name from user to cart

                        $cart->product_title=$product->title;
                        $cart->price=$product->price;
                        $cart->quantity= $request->quantity;
                        $cart->total= $product->price * $request->quantity;

                        $cart->save();

                       

                       // $product->quantity= $product->quantity - $request->quantity;

                        //$product->save();
                    
                    return redirect()->back()->with('message', 'Added to Cart Successfully!');
                 }
                 else
                 {
                    return redirect('login');
                 }
        }



        public function showcart() // SHOWING THE CART
        {       
             
            $user=auth()->user();
            $cart=cart::where('user_id' , $user->id)->get(); // id = id
            $count=cart::where('user_id' , $user->id)->count(); //count in tbl by id
            $total = cart::where('user_id' , $user->id)->sum('total');


            return view('user.showcart', compact('count' , 'cart' , 'total'));

        }


        public function delete($id) //delete in cart
        {


                $data=cart::find($id);


                $data->delete();

                return redirect()->back()->with('message', 'Remove to Cart Successfully!');
        }


        public function order(Request $request) //confirm order
        {
            $user=auth()->user();

            $name= $user->name;
            $phone= $request->phone;
            $address= $request->address;

            foreach($request->productname as $key=>$productname)
            {
                $order = new order;

                $order->product_name=$request->productname[$key];
                $order->quantity=$request->quantity[$key];
                $order->price=$request->price[$key];
                $order->total=$request->total[$key];
                $order->name=$name;
                $order->phone=$phone;
                $order->address=$address;
                $order->status='not delivered';


                $order->save();
            }
            DB::table('carts')->where('name', $name)->delete();
             return redirect()->back()->with('message', 'Ordered Successfully!');

        }


        public function transaction()
        {
            $user=auth()->user();
            $order=order::where('name' , $user->name)->where('status', '=' , 'not delivered')->get(); // id = id
            $count=order::where('name' , $user->name)->where('status', '=' , 'not delivered')->count(); //count in tbl by id
            $total = order::where('name' , $user->name)->where('status', '=' , 'not delivered')->sum('total');


            return view('user.transaction', compact('count' , 'order' , 'total'));
        }


        public function history()
        {
            $user=auth()->user();
            $order=order::where('name' , $user->name)->where('status', '=' , 'delivered')->get(); // id = id
            $count=order::where('name' , $user->name)->where('status', '=' , 'delivered')->count(); //count in tbl by id
            $total = order::where('name' , $user->name)->where('status', '=' , 'delivered')->sum('total');


            return view('user.history', compact('count' , 'order' , 'total'));
        }


        public function drinks()
        {
        $user_type=Auth::user()->user_type; //getting user_type


        if($user_type=='1')
        {

            return view('admin.home'); //admin
        }
        else
        {
            
            $data = product::where('description' , 'Drinks')->paginate(6); //show all data in db by 3
            $user=auth()->user();
            $count=cart::where('user_id' , $user->id)->count(); //count in tbl by id
            return view('user.home', compact('data' , 'count')); // user
        }
        }

        public function burger()
        {
        $user_type=Auth::user()->user_type; //getting user_type


        if($user_type=='1')
        {

            return view('admin.home'); //admin
        }
        else
        {
            
            $data = product::where('description' , 'Burgers')->paginate(6); //show all data in db by 3
            $user=auth()->user();
            $count=cart::where('user_id' , $user->id)->count(); //count in tbl by id
            return view('user.home', compact('data' , 'count')); // user
        }
        }

         public function chicken()
        {
        $user_type=Auth::user()->user_type; //getting user_type


        if($user_type=='1')
        {

            return view('admin.home'); //admin
        }
        else
        {
            
            $data = product::where('description' , 'Chicken')->paginate(6); //show all data in db by 3
            $user=auth()->user();
            $count=cart::where('user_id' , $user->id)->count(); //count in tbl by id
            return view('user.home', compact('data' , 'count')); // user
        }
        }
        public function add_on()
        {
        $user_type=Auth::user()->user_type; //getting user_type


        if($user_type=='1')
        {

            return view('admin.home'); //admin
        }
        else
        {
            
            $data = product::where('description' , 'Add-on')->paginate(6); //show all data in db by 3
            $user=auth()->user();
            $count=cart::where('user_id' , $user->id)->count(); //count in tbl by id
            return view('user.home', compact('data' , 'count')); // user
        }
        }

        public function dessert()
        {
        $user_type=Auth::user()->user_type; //getting user_type


        if($user_type=='1')
        {

            return view('admin.home'); //admin
        }
        else
        {
            
            $data = product::where('description' , 'Dessert')->paginate(6); //show all data in db by 3
            $user=auth()->user();
            $count=cart::where('user_id' , $user->id)->count(); //count in tbl by id
            return view('user.home', compact('data' , 'count')); // user
        }
        }

         public function side_menu()
        {
        $user_type=Auth::user()->user_type; //getting user_type


        if($user_type=='1')
        {

            return view('admin.home'); //admin
        }
        else
        {
            
            $data = product::where('description' , 'Side Menu')->paginate(6); //show all data in db by 3
            $user=auth()->user();
            $count=cart::where('user_id' , $user->id)->count(); //count in tbl by id
            return view('user.home', compact('data' , 'count')); // user
        }
        }
}
