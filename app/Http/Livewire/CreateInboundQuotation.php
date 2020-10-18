<?php

namespace App\Http\Livewire;

use App\Models\RequestForQuotation;
use Livewire\Component;

class CreateInboundQuotation extends Component
{
    public $rfq;
    public $products = [];

    public function mount(RequestForQuotation $rfq)
    {

        $this->products = $rfq->products->map(function ($product) {
            $product->amount = 10;
            $product->price = 5;

            return $product;
        })
            ->toArray();

        $this->rfq = $rfq;
    }

    public function render()
    {
        return view('livewire.create-inbound-quotation');
    }
}
