<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::get();
        // dd($posts->toArray());
        return view('backend.post.index', compact('posts'));
    }

    public function detail($id){
        $post = Post::find($id);
        if($post){
            return view('backend.post.detail', compact('post'));
        }else{
            return view('errors.404Page');
        }
    }

    public function create(){
        $categories = Category::get();
        return view('backend.post.create', compact('categories'));
    }

    public function post(Request $request){
        $validate = validator($request->all(), [
            'title' => 'required|min:3',
            'category' => 'required',
            'description' => 'required|min:3',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate);
        }
        // image upload
        if(file_exists($request->cover)){
            $cover_name = 'cover-img-'.uniqid().'.'.$request->cover->getClientOriginalExtension();
            $request->cover->move('assets/images/',$cover_name); // upload image
            $cover_path = 'assets/images/'.$cover_name;
        }else{
            $cover_name = 'assets/images/default-cover.jpg';
        }
        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'cover' => $cover_path,
            'user_id' => 1,
        ]);
        if($post){
            return redirect()->back()->with('success', 'Success');
        }else{
            return view('errors.500Page');
        }
    }
}
