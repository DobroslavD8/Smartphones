<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Главна страница
    public function index(){
        $title = 'Welcome!';
        return view(pages.index)->with('title', $title);
    }

    // Втора страница
    public function secondpage(){
        $title = 'second page title';
        return view(page.secondpage)->with('title', $title);
    }

    // Трета страница
    public function thirdpage(){
        $title = 'third page title';
        return view(page.thirdpage)->with('title', $title);
    }
}
