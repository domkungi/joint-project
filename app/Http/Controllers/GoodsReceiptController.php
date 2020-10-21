<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\GoodsReceipt;
use App\Models\PurchaseOrder;
use App\Models\Stock;
use App\Models\Storage;
use Illuminate\Http\Request;

class GoodsReceiptController extends Controller
{
    public function index()
    {
        $grs = GoodsReceipt::all();
      
        
        return view('gr.index', ['grs' => $grs]
        );
    }

    public function show(GoodsReceipt $gr)
    {
        
        //return $gr->stocks;
        
        return view('gr.show', ['gr' => $gr,
                                            
        ]);
    }

    public function create(PurchaseOrder $po)
    {
        //return $po->inboundQuotation->products;
        $employees = Employee::all();
        $storages = Storage::all();
        
         return view('gr.create', ['storages' => $storages,
                                    'po' => $po,
                                    'employees' => $employees
         ]);
    }

    public function store(PurchaseOrder $po)
    {
        
        $grs = GoodsReceipt::create([
            'purchase_order_id' => $po->id,
            'storage_id' =>request('storage_id'),
        ]);
       //return $po->inboundQuotation->items;
      
     
   
    
        foreach ($po->inboundQuotation->items as $item) {
            Stock::create([
                'goods_receipt_id' => $grs->id,
            'storage_id' =>request('storage_id'),
            'product_id' => $item->product_id,
            'inbound_qty' => $item->qty,

        
        ]);
        }
        return redirect('/gr/'.$grs->id);
    }

  
}
