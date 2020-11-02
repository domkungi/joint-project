<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
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
