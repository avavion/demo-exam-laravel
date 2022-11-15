<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function articles()
    {
        $articles = Article::all();

        return view('index', compact('articles'));
    }

    public function signin()
    {
        return view('pages.signin');
    }


    public function signup()
    {
        return view('pages.signup');
    }
}
