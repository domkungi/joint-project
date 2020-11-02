<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $customers = Customer::select('company_name','payment')->get();
        //$invoices = Invoice::groupBy('duedate')->value();
        $invoices = DB::table('invoices')->select('duedate','sale_price')->orderBy('id')->get();
       // return $invoices;
        $dataPoints = [];
        $dataPoints2 = [];
        $dataPoints3= [];
       
        
        foreach($customers as $customer){   
            $dataPoints[] =  array("label"=> $customer->company_name, "y"=>$customer->payment);  
         }
         foreach($products as $product){   
            $dataPoints2[] =  array("label"=> $product->name, "y"=>$product->total_sale);  
         }
            foreach($invoices as $invoice){   
                $dataPoints3[] = array("label"=> $invoice->duedate, "y"=>$invoice->sale_price); 
         }
       //return $dataPoints3;
        return view('summary.index', [
        'customers' => $customers,
        'dataPoints' => $dataPoints,
        'dataPoints2' => $dataPoints2,
        'dataPoints3' => $dataPoints3,
        ]);
    }
}
