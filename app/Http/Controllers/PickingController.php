<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Picking;
use App\Models\SaleOrder;
use App\Models\Stock;
use App\Models\Storage;
use Illuminate\Http\Request;

class PickingController extends Controller
{
    public function index()
    {
        $pickings = Picking::all();
        return view('picking.index', ['pickings' => $pickings,
                                            
        ]);
    }

    public function show(Picking $picking)
    {
        
    return view('picking.show', ['picking' => $picking,
                                            
        ]);
    }

    

    public function create(SaleOrder $saleorder)
    {
        $employees = Employee::all();
        $storages = Storage::all();
        return view('picking.create', ['saleorder' => $saleorder,
                                       'employees' => $employees,
                                       'storages' => $storages
        ]);
    }

    public function store(SaleOrder $saleorder)
    {
    
         $productIds = $saleorder->products->pluck('id'); 

         $latestProductStocks = Stock::all()
            ->groupBy('product_id')
            ->map(function ($products) {
                return $products->last();
            })
            ->values()
            ->filter(function ($product) use ($productIds) {
                return $productIds->contains($product->product_id);
            });
          
       
           $saleorder->products->zip($latestProductStocks)->each(function ($merge) use ($saleorder) {
            $product = $merge[0];
            $stock = $merge[1];

            Stock::create([
                'storage_id' => request('storage_id'),
                'product_id' => $product->id,
                'outbound_qty' => $product->pivot->qty,
                'current_qty' => (!$stock ? 0 : $stock->current_qty) - $product->pivot->qty
            ]);
        });
        $pickings = Picking::create([
            'sale_order_id' =>  $saleorder->id,
            'customer_id' =>$saleorder->customer->id,
            'employee_id' =>request('employee_id'),
            'storage_id' => request('storage_id'),
            'duedate' => request('duedate'),
            
        ]);

        foreach ($saleorder->orders as $order) {
            $order->update(['picking_id' => $pickings->id
            
            ]);
        }


        return redirect('/picking');
    }
}
