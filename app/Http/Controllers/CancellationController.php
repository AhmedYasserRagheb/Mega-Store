<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\UserCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CancellationController extends Controller
{
    public function index(){
        $user=Auth::user()->id;
        $orders = UserCard::where('User_id', '=', $user)->get();

        return view('user.cancellation', compact('orders'));
    }

    public function cancel($id){
        $cancel = UserCard::findOrFail($id);
        $cancel->delivery_status = 'canceld';
        $cancel->payment_status = 'Not Avail';

        $cancel->save();

        return back();
      

    }
}
