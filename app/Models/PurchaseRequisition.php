<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRequisition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'items')->withPivot('qty');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
