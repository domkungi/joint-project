<?php

namespace App\Http\Controllers;

use App\Models\PurchaseRequisition;
use App\Models\Employee;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseRequisitionController extends Controller
{
    public function index()
    {
        $prs = PurchaseRequisition::with('employee')->get();
        //echo $prs;
        return view('pr.index', ['prs' => $prs,]);
    }

    public function show(PurchaseRequisition $pr)
    {
        //return $pr;
        return view('pr.show', ['pr' => $pr]);
    }


    public function create()
    {
        $employees = Employee::all();
        $products = Product::all();
        return view('pr.create', [
            'employees' => $employees,
            'products' => $products
        ]);
    }

    public function store()
    {
        $items = collect(request('items'))->values();
        
        $pr = PurchaseRequisition::create([
            'employee_id' =>  request('employee_id'),
            'duedate' =>  request('duedate')
        ]);

        for ($i = 0; $i < count($items); $i++) {
            if (array_key_exists('product_ids', $items[$i])) {
                Item::create([
                    'product_id' => $items[$i]['product_ids'],
                    'qty' =>  $items[$i]['qty'],
                    'purchase_requisition_id' => $pr->id,
                ]);
            }
        }

        return redirect('/pr/'.$pr->id);
    }
}
