<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Storage $storage)
    {


        $stocks = Stock::with('product')->get()->where('storage_id', $storage->id);
        $i = 0;

        // return $stocks;

        return view('stock.index', [
            'stocks' => $stocks,
            'storage' => $storage

        ]);
    }
    public function issuegoods()
    {
        $stocks = Stock::all();
     
        return view('stock.issuegoods', [
            'stocks' => $stocks,
            
        ]);
    }


    public function show(Storage $storage)
    {
        

        $stocks = $storage->stocks
            ->groupBy('product.id')
            ->map(function ($product) {
                return $product->last();
            })
            ->values();

           // $stocks= $stocks->orderBy('created_at','desc')->get();
        return view('stock.show', [

            'storage' => $storage,
            'stocks' => $stocks,
        ]);
    }
}
