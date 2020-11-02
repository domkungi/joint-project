<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\GoodsReceipt;
use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\Stock;
use App\Models\Storage;
use Illuminate\Http\Request;

class GoodsReceiptController extends Controller
{
    public function index()
    {
        $grs = GoodsReceipt::all();


        return view('gr.index', ['grs' => $grs]);
    }

    public function show(GoodsReceipt $gr)
    {

        //return $gr->stocks;

        return view('gr.show', ['gr' => $gr,]);
    }

    public function create(PurchaseOrder $po)
    {
        //return $po->inboundQuotation->products;
        $employees = Employee::all();
        $storages = Storage::all();

        return view('gr.create', [
            'storages' => $storages,
            'po' => $po,
            'employees' => $employees
        ]);
    }

    public function store(PurchaseOrder $po)
    {

        $grs = GoodsReceipt::create([
            'purchase_order_id' => $po->id,
            'storage_id' => request('storage_id'),
        ]);

        foreach ($po->items as $item) {
            $item->update(['goods_receipt_id' => $grs->id]);
        }


        $productIds = $grs->products->pluck('id'); #มี product id ไรบ้าง


        $latestProductStocks = Stock::where('storage_id', request('storage_id'))
            ->get()
            ->groupBy('product_id')
            ->map(function ($products) {
                return $products->last();
            })
            ->values()
            ->filter(function ($product) use ($productIds) {
                return $productIds->contains($product->product_id);
            });



        $grs->products->zip($latestProductStocks)->each(function ($merge) use ($grs) {
            $product = $merge[0];
            $stock = $merge[1];

            Stock::create([
                'storage_id' => request('storage_id'),
                'product_id' => $product->id,
                'inbound_qty' => $product->pivot->qty,
                'current_qty' => (!$stock ? 0 : $stock->current_qty)   + $product->pivot->qty
            ]);
        });


        return redirect('/gr/' . $grs->id);
    }
}
