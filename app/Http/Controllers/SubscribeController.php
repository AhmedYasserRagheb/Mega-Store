<?php

namespace App\Http\Controllers;

use App\Mail\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function subscribe(Request $request){
        $mail = $request->email;
        Mail::to($mail)->send(new Subscribe);
        return back();
    }
}
