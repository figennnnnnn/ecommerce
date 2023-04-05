<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Secondcampaign;
use App\Models\ShippingInfo;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ClientController extends Controller
{

    public function CategoryPage($id){
        $subcategory = Subcategory::findOrFail($id);
        $products = Product::where('product_subcategory_id', $id)->latest()->get();
        return view('user_template.category', compact('subcategory', 'products'));
    }


    public function Home(){
        // $allproducts = Product::latest()->get();
        $allproducts = Cache::rememberForever('allproducts', function(){
            return Product::latest()->get();
        });
        return view('user_template.home', compact('allproducts'));
    }

    public function AddToCart(){
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        // $allcampaign = Campaign::latest()->get();
        $allcampaign = Cache::rememberForever('allcampaign', function(){
            return Campaign::latest()->get();
        });
        // $allsecondcampaign = Secondcampaign::latest()->get();
        $allsecondcampaign = Cache::rememberForever('allsecondcampaign', function(){
            return Secondcampaign::latest()->get();
        });
        return view('user_template.addtocart', compact('cart_items', 'allcampaign', 'allsecondcampaign'));
    }

    public function AddProductToCart(Request $request){
        $product_id =$request->product_id;        
        $product_price = Product::where('id', $product_id)->value('product_price');

        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $product_price,
        ]);

        return redirect()->route('addtocart')->with('message', 'Your item added to cart succesfully!');
    }
    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();

        return redirect()->route('addtocart')->with('message', 'Your item  removed from cart succesfully!');
    }

    public function GetShippingAddress(){
        return view('user_template.shippingaddress');
    }

    public function AddShippingAddress(Request $request){
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'city_name' => $request->city_name,
            'postal_code' => $request->postal_code,
        ]);

        return redirect()->route('checkout');
    }

    public function Checkout(){
        $userid = Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        
        // $cache_key = 'form_data';
        // $cache_data = array(
        //     'phone_number' => $userid,
        //     'city_name' => $cart_items,
        //     'postal_code' => $shipping_address,
        // );
        // Cache::put($cache_key, $cache_data, 300);
        // echo Cache::get($cache_key);

        return view('user_template.checkout', compact('cart_items', 'shipping_address'));
    }

    public function PlaceOrder(){
        $userid = Auth::id();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        $cart_items = Cart::where('user_id', $userid)->get();

        foreach($cart_items as $item){
            Order::insert([
                'userid' =>$userid,
                'shipping_phoneNumber' => $shipping_address->phone_number,
                'shipping_city' => $shipping_address->city_name,
                'shipping_postalcode' => $shipping_address->postal_code,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,
            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        ShippingInfo::where('user_id', $userid)->first()->delete();

        return redirect()->route('pendingorders')->with('message', 'Your Order Has Been Placed succesfully!');
    }

    public function UserProfile(){
        return view('user_template.userprofile');
    }

    public function PendingOrders(){
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('user_template.pendingorders', compact('pending_orders'));
    }

    public function History(){
        return view('user_template.history');
    }

}
