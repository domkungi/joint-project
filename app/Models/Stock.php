<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

   


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
