<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Quotation;
use App\Models\SaleOrder;
use Illuminate\Http\Request;

class SaleOrderController extends Controller
{
    public function index()
    {
        $saleorders = SaleOrder::all();
        return view('saleorder.index', ['saleorders' => $saleorders,
                                            
        ]);
    }

    public function show(SaleOrder $saleorder)
    {
        
        return view('saleorder.show', ['saleorder' => $saleorder,
                                            
        ]);
    }


    public function create(Quotation $quotation)
    {
        //return $quotation;
        $employees = Employee::all();
        if ($quotation->customer->type == 'member') {
            $member_ans = "conditions correct";
        } else {
            $member_ans = "conditions incorrect";
        }
        if ($quotation->subtotal > 400000) {
            $special_ans = "conditions correct";
        } else {
            $special_ans = "conditions incorrect";
        }


        return view('saleorder.create', [
            'quotation' => $quotation,
            'employees' => $employees,
            'member_ans' => $member_ans,
            'special_ans' => $special_ans
        ]);
    }

    public function store(Quotation $quotation)
    {
        $or = collect(request('orders'))->values();
        $i = 0;
        $discount=[]; 
        $subtotal = 0;
        $member_discount = 0;
        $special_discount = 0;

        foreach ($quotation->orders as $order) {
            $order->update(['qty' => intval($or[$i]['qty'])]);  
            $i++;   
        } 

        $i = 0;
        foreach($quotation->orders as $order)
        {
            if(($order->qty)>5)
            {
                $discount[$i] = (5/100)*($order->qty)*($order->price);
            }
            else if(($order->qty)<=5)
            {
                $discount[$i] = 0;
            }
           $totalprice[] = (($order->qty)*($order->price))-$discount[$i];
             $order->update(['discount' => $discount[$i],
             ]);
             $i++; 
        }
        
       
        $subtotal = array_sum($totalprice);
        
        if($subtotal > 400000)
        {
            $special_discount = (10/100)*($subtotal);
        }
        if(($quotation->customer->type) == 'member')
        {
            $member_discount = ((10/100)*($subtotal));
        }
       
        $vat1 = ($quotation->vat/$quotation->subtotal)*100;
        $vat2 = ($vat1/100)*$subtotal;
        
        $total = $subtotal+$vat2-$member_discount-$special_discount;

      
        $saleorders = SaleOrder::create([
            'quotation_id' =>  $quotation->id,
            'customer_id' =>$quotation->customer->id,
            'employee_id' =>request('employee_id'),
            'subtotal' => $subtotal,
            'vat' => $vat2,
            'member_discount' => $member_discount,
            'special_discount' => $special_discount,
            'total' => $total,
            'duedate' => request('duedate'),
            'requested_delivery_date' => request('requested_delivery_date')
        ]);

        $j=0;
        foreach ($quotation->orders as $order) 
        {
            $order->update([
                            'sale_order_id' => $saleorders->id,
                            'totalprice' => $totalprice[$j]
                           ]);
            $j++;
        }

        return redirect('/saleorder/' . $saleorders->id);
    }
}
