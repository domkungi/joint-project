<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function inboundQuotation()
    {
        return $this->belongsTo(InboundQuotation::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'items')->withPivot('qty','price','totalprice');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
