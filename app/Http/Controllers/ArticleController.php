<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index($id = null){
        return view('article.index', [
            'title' => $id,
            'body' => 'My first Laravel.'
        ]);

    }
}
