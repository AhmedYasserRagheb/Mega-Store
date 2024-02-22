<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Mail\OrderProcessing;
use App\Models\category;
use App\Models\order;
use App\Models\product;
use App\Models\User;
use App\Models\UserCard;
use App\Models\comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stripe;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class adminController extends Controller
{



    public function index()
    {
  

        $products = product::paginate(6);
        return view('user.home', compact('products'));
    }

    public function redirect()
    {

        $user = Auth::user()->userType;

        if ($user == 'admin') {
            $total_products = product::all()->count();
            $total_orders = UserCard::all()->count();
            $total_customers = user::all()->where('userType', '=', 'user')->count();
            $total_price = UserCard::all()->where('payment_status', '=', 'paid');

            $total_processing = UserCard::all()
                ->where('delivery_status', '=', 'processing')
                ->count();

            $total_deliverd = UserCard::all()
                ->where('delivery_status', '=', 'deliverd')
                ->count();

            $total_Revenue = 0;

            foreach ($total_price as $total_paid) {
                $total_Revenue += $total_paid->price;
            }


            return view('admin.dashboard', compact('total_products', 'total_orders', 'total_customers', 'total_customers', 'total_processing', 'total_deliverd', 'total_Revenue'));
        } else {

            $products = product::paginate(6);

            $category = category::all();
            return view('user.home', compact('products', 'category'));
        }
    }

    public function details($id)
    {
        $product = product::find($id);
        $user_comment = comment::all();
        // $date = date('y.m.d: h.m');
        // $date= current()
        return view('user/productDetails', compact('product', 'user_comment'));
    }



    public function addTocard(Request $request, $id)
    {
        $user = auth::user();
        $order = product::findOrFail($id);
        $product = product::findOrFail($id);
        $myOrder = new order();
        $user_comment = comment::all();
        $user_card = new UserCard();


        if ($user) {



            $order->quantity = $request->order_quantity;
            $order_quantity = $order->quantity;

            $product_quantity = $product->quantity;
            $Remaining_quantity = $product_quantity - $order_quantity;
            $product->quantity = $Remaining_quantity;



            $myOrder->UserId = $user->id;
            $myOrder->UserName = $user->name;
            $myOrder->email = $user->email;
            $myOrder->Phone = $user->phone;
            $myOrder->Address = $user->address;

            $myOrder->productId = $product->id;
            $myOrder->Item = $product->title;
            $myOrder->Quantity = $order->quantity;


            if ($product->discount_price != null) {
                $myOrder->Price = $product->discount_price * $order_quantity;
            } else {
                $myOrder->Price = $product->price * $order_quantity;
            }


            $myOrder->save();

           
            Alert::success('add to card', 'product added successfully');

            return view('user.productDetails', compact('myOrder', 'product', 'user_comment'));
            
            

        } else {

            return view('auth.register');
        }
    }


    public function BuyNow()
    {
        if (auth::user()) {


            return "buyNow";
        } else {
            return view('auth.register');
        }
    }

    public function Back()
    {
        return view('user.product');
    }


    public function user_card()
    {
        $userDetails = Auth::user();
        $userName = $userDetails->name;
        $data = order::where('UserName', '=', $userName)->get();
        $cardDetails = new UserCard();

        foreach ($data as $Details) {
            $cardDetails->User_id = $userDetails->id;
            $cardDetails->Name = $Details->UserName;
            $cardDetails->email = $Details->email;
            $cardDetails->phone = $Details->Phone;
            $cardDetails->address = $Details->Address;

            $cardDetails->Product_id = $Details->productId;
            $cardDetails->Item = $Details->Item;
            $cardDetails->quantity = $Details->Quantity;
            $cardDetails->price = $Details->Price;

            $cardDetails->payment_status = "Cash on delivery";
            $cardDetails->delivery_status = "processing";

            $cardDetails->save();

            $card_id = $Details->id;
            $deleteOrder = order::find($card_id);
            $deleteOrder->delete();
        }

        Mail::to($userDetails->email)->send(new OrderProcessing($userName));

        return redirect()->back();
    }

    public function stripe($total_price)
    {
        return view('user.stripe', compact('total_price'));
    }


    public function stripePost(Request $request, $total_price)
    {


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        return back();
    }

    public function userOrders()
    {


        $orders = UserCard::paginate(6);
        return view('admin.orders', compact('orders'));
    }


    public function deliverd($id)
    {

        $deliver = UserCard::findOrFail($id);
        $deliver->payment_status = "paid";
        $deliver->delivery_status = "deliverd";


        $deliver->save();


        $mail = $deliver->email;
        $userName = $deliver->Name;

        Mail::to($mail)->send(new InvoiceMail($userName));

        return redirect()->back();
    }

    public function pdf($id)
    {

        // $date = Carbon::now();
        $print = UserCard::findOrFail($id);
        // $FileName = '$print->Name.pdf';


        $pdf = pdf::loadView('admin.invoice', compact('print'));
        return $pdf->download('invoice.pdf');
    }


    public function search(Request $request)
    {
        $text = $request->search;
        $orders = UserCard::where('Name', 'LIKE', "%$text%")->orWhere('delivery_status', 'LIKE', "%$text%")->paginate(6);

        if ($orders) {

            return view('admin.orders', compact('orders'));
        } else {

            return back();
        }
    }


    public function comments($id, Request $request)
    {


        $user = Auth::user();

        if ($user) {
            $user_comment = new comment();
            $user_comment->user = $user->name;
            $user_comment->product_id = $id;
            $user_comment->comments = $request->user_comment;

            $user_comment->save();
            
        } else {
            return view('auth.register');
        }

        return redirect()->back();
        
    }

    
    public function all_products(){
        $products = product::paginate(6);
        $user_comment = comment::all();
        return view('user.allproducts', compact('products', 'user_comment'));
    }

}
