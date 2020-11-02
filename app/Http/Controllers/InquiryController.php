<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Inquiry;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::with('customer')->get();
        
        return view('inquiry.index', ['inquiries' => $inquiries,]);
    }

    public function show(Inquiry $inquiry)
    {
       // return $inquiry->products;
        

        return view('inquiry.show', ['inquiry' => $inquiry]);
    }

    public function create()
    {

        $customers = Customer::all();
        $products = Product::all();
        
        return view('inquiry.create', [
            'customers' => $customers,
            'products' => $products
        ]);
    }

    public function store()
    {
        $orders = collect(request('orders'))->values();
        
        $inquiries = Inquiry::create([
            'customer_id' =>  request('customer_id'),
            'duedate' => request('duedate')
        ]);
        
        for ($i = 0; $i < count($orders); $i++) {
            if (array_key_exists('product_ids', $orders[$i])) {
                Order::create([
                    'product_id' => $orders[$i]['product_ids'],
                    'qty' =>  $orders[$i]['qty'],
                    'inquiry_id' => $inquiries->id,
                    'price' =>  $orders[$i]['price'],
                    'totalprice' => ($orders[$i]['price'])*( $orders[$i]['qty'])
                ]);
            }
        }
    
        return redirect('/inquiry/'.$inquiries->id);
    
    }
}
