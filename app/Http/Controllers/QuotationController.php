<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Inquiry;
use App\Models\Quotation;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::with('customer')->get();
        
        return view('quotation.index', ['quotations' => $quotations,]);
    }

    public function show(Quotation $quotation)
    {
        //return $quotation->products;
        
        
        return view('quotation.show', ['quotation' => $quotation,
                                            
        ]);
    }

    public function create(Inquiry $inquiry)
    {
        $employees = Employee::all();
       return view('quotation.create', ['inquiry' => $inquiry,
                                        'employees' => $employees]);
    }

    public function store(Inquiry $inquiry)
    {
          
        $totalprice = [];
        $subtotal = 0;
        $i=0;
        $discount = [];
        $member_discount = 0;
        $special_discount = 0;
       

        foreach($inquiry->orders as $order)
        {
            if(($order->qty)>5)
            {
                $discount[$i] = (5/100)*($order->qty)*($order->price);
            }
            else if(($order->qty)<=5)
            {
                $discount[$i] = 0;
            }
            $order->update(['discount' => $discount[$i], ]);
           $totalprice[] = (($order->qty)*($order->price))-$discount[$i];
           //$subtotal = $subtotal+$totalprice; 
            
        }
        $subtotal = array_sum($totalprice);
        
        if($subtotal > 400000)
        {
            $special_discount = (10/100)*($subtotal);
        }
        if(($inquiry->customer->type) == 'member')
        {
            $member_discount = ((10/100)*($subtotal));
        }
       
        $vat = (request('vat')/100)*$subtotal;
        
        $total = $subtotal+$vat-$member_discount-$special_discount;

      
        $quotations = Quotation::create([
            'inquiry_id' =>  $inquiry->id,
            'customer_id' =>$inquiry->customer->id,
            'employee_id' =>request('employee_id'),
            'subtotal' => $subtotal,
            'vat' => $vat,
            'member_discount' => $member_discount,
            'special_discount' => $special_discount,
            'total' => $total,
            'duedate' => request('duedate')
        ]);
            
        $j=0;
        foreach ($inquiry->orders as $order) {
            $order->update([
                            'quotation_id' => $quotations->id,
                            'totalprice' => $totalprice[$j]
                           ]);
            $j++;
        }



      
        return redirect('/quotation/'.$quotations->id);
    }

}
