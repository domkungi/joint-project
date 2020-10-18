<?php

namespace App\Http\Controllers;

use App\Models\InboundQuotation;
use App\Models\Item;
use App\Models\RequestForQuotation;
use Illuminate\Http\Request;

class InboundQuotationController extends Controller
{
    public function index()
    {
        $inquotations = InboundQuotation::with('vendor')->get();

        return view('inquotation.index', ['inquotations' => $inquotations]);
    }

    public function create(RequestForQuotation $rfq)
    {
      

        return view('inquotation.create', ['rfq' => $rfq]);
    }
    public function store(RequestForQuotation $rfq)
    {

        return request()->all();
        /*
        $inquotations = InboundQuotation::create([
            'request_for_quotation_id' =>  $rfq->id,
            'vendor_id' =>$rfq->vendor->id,
            'subtotal' => $subtotal,
            'vat' => $vat,
            'total' => $total
        ]);

        foreach($rfq->purchaseRequisition->products as $product){
           
            Item::create([
                'product_id' => $product->id,
                'qty' => $product->pivot->qty,
                'purchase_requisition_id' => $rfq->purchaseRequisition->id,
                'request_for_quotation_id' => $rfq->id,
                'inbound_quotation_id' => $inquotations->id,
                'price' => $x
            ]);  

        }
        */
    }
}
