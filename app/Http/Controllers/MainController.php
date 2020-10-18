<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
       
        return view('index');
    }

    public function mmindex()
    {
       
        return view('mmindex');
    }

    public function sdindex()
    {
       
        return view('sdindex');
    }

}
