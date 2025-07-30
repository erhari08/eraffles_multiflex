<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class POMaterial extends Model
{
    protected $fillable = [
    'po_id', 'product_id', 'specification', 'qty', 'unit',
    'rate_per_unit', 'gst', 'amount'
];
}
