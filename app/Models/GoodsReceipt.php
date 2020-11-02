<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsReceipt extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class ,'items')->withPivot('qty');
    }

}
