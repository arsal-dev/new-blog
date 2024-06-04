<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('welcome', ['blogs' => Blog::get()]);
    }

    public function view($id)
    {
        return view('blog', ['blog' => Blog::where('id', $id)->get()->all()]);
    }

    public function search(Request $request)
    {
        $searchItem = $request->search;

        $find = Blog::where('title', 'like', "%$searchItem%")->orWhere('body', 'like', "%$searchItem%")->get();

        dd($find);
    }
}
