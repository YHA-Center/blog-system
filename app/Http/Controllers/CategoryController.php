<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::orderBy('updated_at', 'desc')->paginate(5);
        // dd($categories);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        Validator::make($request->all(), [
            'categoryName' => 'required|min:2',
        ])->validate();
        // get request data
        $data = [
            'name' => $request->categoryName,
        ];
        // store
        Category::create($data);
        // redirect
        return redirect()->route('category.index')->with('success', 'Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // get request data
        $data = Category::where('id', $id)->first();
        // return data
        return view('backend.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validation
        Validator::make($request->all(), [
            'categoryName' => 'required|min:2',
        ])->validate();
        // get request data
        $data = [
            'name' => $request->categoryName,
        ];
        // update query
        Category::where('id', $id)->update($data);
        // return
        return redirect()->route('category.index')->with('success', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // delete query
        Category::where('id', $id)->delete();
        // redirect
        return redirect()->route('category.index')->with(['success' => 'Deleted Category Successfully!']);
    }
}
