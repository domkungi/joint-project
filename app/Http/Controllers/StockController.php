<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Storage;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Storage $storage)
    {


         $stocks = Stock::with('product')->get()->where('storage_id', $storage->id);

        return $stocks;

        return view('stock.index', [
            'stocks' => $stocks,
            'storage' => $storage

        ]);
    }
}
