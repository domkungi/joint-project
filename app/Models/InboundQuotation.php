<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InboundQuotation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function requestForQuotation()
    {
        return $this->belongsTo(RequestForQuotation::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'items')->withPivot('qty','price','totalprice');
    }

   

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
