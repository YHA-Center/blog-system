<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(7); // get all post
        // dd($posts->toArray());
        return view('backend.post.index', compact('posts'));
    }

    public function detail($id){
        $post = Post::find($id); // get the specific post
        if($post){ // if post exits
            return view('backend.post.detail', compact('post'));
        }else{ // then error
            return view('errors.404Page');
        }
    }

    // direct to create view file
    public function create(){ // create view page
        $categories = Category::get(); // pass categories to page
        return view('backend.post.create', compact('categories'));
    }

    // insert into database
    public function post(Request $request){
        $validate = validator($request->all(), [ // make validation
            'title' => 'required|min:3',
            'category' => 'required',
            'description' => 'required|min:3',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
        ]);
        if($validate->fails()){ // if validation fails
            return back()->withErrors($validate); // got error
        }
        // image upload
        if(file_exists($request->cover)){ // check file
            // get file name
            $cover_name = 'cover-img-'.uniqid().'.'.$request->cover->getClientOriginalExtension();
            // store the file with path
            $request->cover->move('assets/images/',$cover_name); // upload image
            // note the path
            $cover_path = 'assets/images/'.$cover_name;
        }else{
            $cover_name = 'assets/images/default-cover.jpg';
        }
        $post = Post::create([ // insert query
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'cover' => $cover_path,
            'user_id' => 1,
        ]);
        if($post){ // if yes, then success
            return redirect()->back()->with('success', 'Success');
        }else{ // if no, then error
            return view('errors.500Page');
        }
    }

    // edit the post
    public function edit($id){
        $categories = Category::get();
        $post = Post::find($id);
        return view('backend.post.edit', compact('categories', 'post'));
    }

    // update the post
    public function update($id, Request $request){
        $validate = validator($request->all(), [ // check validation
            'title' => 'required|min:3',
            'category' => 'required',
            'description' => 'required|min:3',
        ]);
        if($validate->fails()){  // if yes, then give error
            return back()->withErrors($validate);
        }
        $post = Post::find($id);
        // remove old image and uplod new image
        if($request->hasFile('cover')){ // if yes
            $request->validate([ // check validation
                'cover' => 'required|image|mimes:jpeg,jpg,png,gif,svg,webp',
            ]);
            if(file_exists($post->cover)){ // unlink old image
                unlink($post->cover);
            }
            // get file name
            $cover_name = 'cover-img-'.uniqid().'.'.$request->cover->getClientOriginalExtension();
            // store the file with path
            $request->cover->move('assets/images/',$cover_name); // upload image
            // note the path
            $cover_path = 'assets/images/'.$cover_name;
        }else{
            $cover_path = $post->cover;
        }

        $post->update([ // update query
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => 1,
            'cover' => $cover_path,
        ]);
        return redirect()->back()->with('success', 'Success');
    }

    // delete 
    public function destory($id){
        $post = Post::find($id);
        if($post){
            if(file_exists($post->cover)){
                unlink($post->cover);
            }
            $post->delete();
            return redirect()->back()->with('success', 'Success!');
        }else{
            return view('errors.500Page');
        }
    }
}
