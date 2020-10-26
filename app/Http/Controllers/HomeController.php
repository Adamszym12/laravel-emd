<?php


namespace App\Http\Controllers;


use App\Models\Page;

class HomeController
{
    public function index(){
        $content = Page::findOrFail(1)->getContent();
        return view('home', compact('content'));
    }
}
