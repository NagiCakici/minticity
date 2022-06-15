<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class blogController extends Controller
{
    public function blogList($id){      
        $categories = category::all();
        $blogs = blog::where('category_id', $id)->get();

        return view('front.blogs')
        ->with('blogs', $blogs)
        ->with('categories', $categories)
        ->with('controller', $this);
    }
    public function newBlog(){ 

        $categories = category::all();

        return view('front.newblog')
        ->with('categories', $categories)
        ->with('controller', $this);
    }

    public function addBlog(Request $request){

        $datax['image'] ="";
        if($request->file('image')){
            $category = category::where('id', $request->category_id)->first();
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $path = '/image/'. $category->title;
            $file->move(public_path($path), $filename);
            $datax['image'] = $path . '/' . $filename;
        }

        $data = $request->validate([
            'title' => 'required|unique:blogs',
            'text' => 'nullable:blogs',
            'body' => 'nullable:blogs',
            'image' => 'nullable:blogs',
            'category_id' => 'required:blogs',
        ]);


        $data['image'] = $datax['image'];


        blog::create($data);

        return redirect()->back();
    }
}
