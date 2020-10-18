<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();

        return view('vendor.index', ['vendors' => $vendors]);
    }

    public function show(Vendor $vendor)
    {
        return $vendor;
    }

    public function create()
    {
        return view('vendor.create');
    }

    public function store()
    {
        Vendor::create([
            'name' =>  request('name'),
            'address' => request('address'),
            'contry' =>  request('contry'),
            'city' => request('city'),
            'zipcode' =>  request('zipcode'),
            'email' => request('email'),
            'phone' =>  request('phone')
        ]);

        return redirect('/vendor');
    }

    public function edit(Vendor $vendor)
    {
        return view('vendor.edit', ['vendor' => $vendor]);
    }

    public function update(Vendor $vendor)
    {
        $vendor->update([
            'vendor_name' =>  request('name'),
            'vendor_address' => request('address'),
        ]);

        return redirect('/vendor');
    }
}

// index
// show
// create - store
// edit - update
// destory
