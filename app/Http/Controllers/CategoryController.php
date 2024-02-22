<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $data = category::all();
        return view("admin.category", compact('data'));
    }

    public function store(Request $request){
        $add = category::create([
            'StockName' => $request->StockName,
        ]);
        return redirect()->back()->with(['message'=> 'data stored successfully']);
    }

    public function destroy($id){
        $delete = category::find($id);
        $delete->delete();
        return redirect()->back()->with(['message'=> 'Item successfully deleted']);
        // return $id;
    }

    // start edit 
    public function edit($id){
        // $edit = category::find($id);
        // // $cat = category::all();
        // return view('admin.update', compact('edit'));
    }
    // end edit function
    
     // start update function 
     public function update(Request $request){


        $item = category::find($request->id);
        $item->StockName = $request->stock;
        $item->save();

        return redirect()->back();
     }
     // end update function

     public function deleteAll(){

        DB::table('categories')->delete();
        // $delete = category::all();
        // $delete->delete();

        return redirect()->back();
     }
}
