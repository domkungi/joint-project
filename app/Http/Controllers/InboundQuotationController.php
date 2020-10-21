<?php

namespace App\Http\Controllers;

use App\Models\InboundQuotation;
use App\Models\Item;
use App\Models\Product;
use App\Models\RequestForQuotation;
use Illuminate\Http\Request;

class InboundQuotationController extends Controller
{
    public function index()
    {
        $inquotations = InboundQuotation::with('vendor')->get();
        return view('inquotation.index', ['inquotations' => $inquotations]);
    }

    public function show(InboundQuotation $inquotation)
    {
        //return $inquotation->products;
        
        
        return view('inquotation.show', ['inquotation' => $inquotation,
                                            
        ]);
    }

    public function create(RequestForQuotation $rfq)
    {
       return view('inquotation.create', ['rfq' => $rfq]);
    }


    public function store(RequestForQuotation $rfq)
    {
       // return request('price');
        $prices = request('price');
        $i=0;
        $totalprice = [];
        $subtotal = 0;

        foreach($rfq->items as $item)
        {
            $totalprice[] = ($item->qty)*$prices[$i];
            $subtotal = $subtotal+($item->qty)*$prices[$i]; 
            $i++;
        }
        
        $vat = (request('vat')/100)*$subtotal;
        $total = $subtotal+$vat;
        
        $inquotations = InboundQuotation::create([
            'request_for_quotation_id' =>  $rfq->id,
            'vendor_id' =>$rfq->vendor->id,
            'subtotal' => $subtotal,
            'vat' => $vat,
            'total' => $total,
            'duedate' => request('duedate')
        ]);

        $j=0;
        foreach ($rfq->items as $item) {
            $item->update(['price' => $prices[$j],
                           'inbound_quotation_id' => $inquotations->id,
                           'totalprice' => $totalprice[$j]
                           ]);
            $j++;
        }



      
        return redirect('/inquotation/'.$inquotations->id);
    }
}
