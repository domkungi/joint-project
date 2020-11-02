<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\SaleOrder;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.index', ['invoices' => $invoices,
                                            
        ]);
    }

    public function show(Invoice $invoice)
    {
        //return $invoice->saleOrder;
        
    return view('invoice.show', ['invoice' => $invoice,
                                            
        ]);
    }

    

    public function create(SaleOrder $saleorder)
    {
        $employees = Employee::all();
        if ($saleorder->customer->type == 'member') {
            $member_ans = "conditions correct";
        } else {
            $member_ans = "conditions incorrect";
        }
        if ($saleorder->subtotal > 400000) {
            $special_ans = "conditions correct";
        } else {
            $special_ans = "conditions incorrect";
        }

        return view('invoice.create', ['saleorder' => $saleorder,
                                       'employees' => $employees,
                                       'member_ans' => $member_ans,
                                       'special_ans' => $special_ans
                                      
        ]);
    }

    public function store(SaleOrder $saleorder)
    {
        
        
        $invoices = Invoice::create([
            'sale_order_id' =>  $saleorder->id,
            'customer_id' =>$saleorder->customer->id,
            'employee_id' =>request('employee_id'),   
            'duedate' => request('duedate'),
            'sale_price' => $saleorder->total,
        ]);

       
            foreach($saleorder->orders as $order)
            {
                $order->update(['invoice_id' => $invoices->id]);
                Product::where('id',$order->product_id)->increment('total_sale',$order->totalprice);  
            } 
        Customer::where('id',$saleorder->customer->id)->increment('payment',$saleorder->total);
        Company::where('name','Handsome')->increment('total_sale',$saleorder->total);

        

        return redirect('/invoice/' . $invoices->id);
    }

}
