<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function materialmain()
    {
        return view('material.materialmain');
    }
}
