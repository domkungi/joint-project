<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customer.index', ['customers' => $customers]);
    }

    public function create()
    {

        $prefixs = ['Mr.','Ms.'];
        $types = ['member','general'];
        return view('customer.create',[ 'prefixs' => $prefixs,
                                        'types' => $types
        ]);
    }

    public function store()
    {
        $name = request('prefix')." ". request('name');
//return $name;
        Customer::create([
            'name' =>  $name,
            'company_name' => request('company_name'),
            'address' => request('address'),
            'country' =>  request('country'),
            'city' => request('city'),
            'zipcode' =>  request('zipcode'),
            'email' => request('email'),
            'phone' =>  request('phone'),
            'type' =>  request('type'),
        ]);

        return redirect('/customer');
    }
}
