<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function saleOrder()
    {
        return $this->belongsTo(saleOrder::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders')->withPivot('qty','price','totalprice','discount');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
