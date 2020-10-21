<?php

namespace App\Http\Controllers;

use App\Models\RequestForQuotation;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Product;
use App\Models\PurchaseRequisition;
use App\Models\Vendor;
use Illuminate\Http\Request;

class RequestForQuotationContrller extends Controller
{
    public function index()
    {
        $rfqs = RequestForQuotation::with('employee')->get();

        return view('rfq.index', ['rfqs' => $rfqs,]);
    }


    public function show(RequestForQuotation $rfq)
    {
        //return $rfq;
        //return $rfq->products;

        return view('rfq.show', ['rfq' => $rfq]);
    }


    public function create(PurchaseRequisition $pr)
    {

        $employees = Employee::all();
        $vendors = Vendor::all();

        return view('rfq.create', [
            'employees' => $employees,
            'vendors' => $vendors,
            'pr' => $pr

        ]);
    }

    public function store(PurchaseRequisition $pr)
    {

        //return $pr->id;
        $rfq = RequestForQuotation::create([
            'purchase_requisition_id' =>  $pr->id,
            'vendor_id' => request('vendor_id'),
            'employee_id' => request('employee_id'),
            'duedate' => request('duedate')
        ]);
        

        foreach ($pr->items as $item) {
            $item->update(['request_for_quotation_id' => $rfq->id]);
        }
        
        return redirect('/rfq/'.$rfq->id);
    }
}
