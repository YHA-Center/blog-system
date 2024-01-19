<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        // read query
        $categories = Category::all();                                                    
        return view('frontend.index', compact('categories'));
    }

    public function index(){
        return view('auth.login');
    }
}
