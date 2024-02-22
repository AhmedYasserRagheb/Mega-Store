<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        // $user_comment = comment::create([
        //     'user'=>Auth::user()->name,
        //     'product_id'=>$id,
        //     'comments'=>$request->user_comment,

        // ]);

        $user_comment= new comment();
        $user_comment->user = Auth::user()->name;
        $user_comment->product_id=$id;
        $user_comment->comments = $request->user_comment;

        $user_comment->save();
        return view('user.productDetails', compact('user_comment'));
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        //
    }
}
