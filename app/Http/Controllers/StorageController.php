<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index()
    {
        $storages = Storage::all();

        return view('storage.index', [ 'storages' => $storages
        ]);
    }

    public function create()
    {
        return view('storage.create');
    }

    public function store()
    {
        Storage::create([
            'company_id' => request('company_id'),
            'country' => request('country'),
        ]);

        return redirect('/index');
    }
}
