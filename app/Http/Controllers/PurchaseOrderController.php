<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\InboundQuotation;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $pos = PurchaseOrder::with('vendor')->get();
        return view('po.index', ['pos' => $pos]);
    }

    public function show(PurchaseOrder $po)
    {
        
        
       // return $po->inboundQuotation;
        return view('po.show', ['po' => $po,
                                            
        ]);
    }

    public function create(InboundQuotation $inquotation)
    {
        $employees = Employee::all();
        
         return view('po.create', ['inquotation' => $inquotation,
                                    'employees' => $employees
         ]);
    }

    public function store(InboundQuotation $inquotation)
    {
        
        $pos = PurchaseOrder::create([
            'inbound_quotation_id' => $inquotation->id,
            'vendor_id' =>$inquotation->vendor->id,
            'employee_id' => request('employee_id'),
            'duedate' => request('duedate')
        ]);
       // return $pos->inboundQuotation->items;
        foreach ($pos->inboundQuotation->items as $item) {
        $item->update([
        'purchase_order_id' => $pos->id
        
        ]);
        }
        return redirect('/po/'.$pos->id);
    }
}
