<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\User;
use App\Models\product;
use RealRashid\SweetAlert\Facades\Alert;

class CardController extends Controller
{
    public function showCard()
    {

        if (auth::user()) {
            $userName = Auth::user()->name;
            $card = order::where('UserName', '=', $userName)->get();

            $title = 'Delete Product!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);

            return view('user.myProducts', compact('card'));
        } else {
            return view('auth.register');
        }
    }

    public function destroy($id)
    {
       
        $card = order::findOrFail($id);

       
        
        $card->delete();
        return redirect()->back();

    }

  

}
