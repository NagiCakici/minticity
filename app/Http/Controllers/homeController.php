<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index(){
        $categories = category::all();

        return view('front.index')
        ->with('categories', $categories)
        ->with('controller', $this);
    }

    public function categoryList(){      
        $categories = category::all();

        return view('front.categories')
        ->with('categories', $categories)
        ->with('controller', $this);
    }
    public function newCategory(){ 

        $categories = category::all();

        return view('front.newcategory')
        ->with('categories', $categories)
        ->with('controller', $this);
    }
    public function editCategory($id){
        $categories = category::all();

        $category = category::where('id', $id)->first();

        return view('front.editcategory')
        ->with('categories', $categories)
        ->with('category', $category)
        ->with('controller', $this);
    }

    public function addCategory(Request $request){
        
        $data = $request->validate([
            'title' => 'required|unique:categories'
        ]);
        category::create($data);
        return redirect()->back();
    }
    public function updateCategory(Request $request){
        $data = $request->validate([
            'title' => 'required|unique:categories'
        ]);
        DB::table('categories')
        ->where('id', $request->id)
        ->update($data);
        return redirect()->back();
    }
    public function deleteCategory($id){      

        $delete = DB::table('categories')
            ->where('id', $id)
            ->delete();
        return redirect()->back();
    }
}
