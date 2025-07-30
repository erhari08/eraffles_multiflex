<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrnMaterial extends Model
{
     protected $fillable = [
        'grns_id',
        'product_id',
        'category_id',
        'specification',
        'qty',
        'unit',
        'rate_per_unit',
        'gst',
        'amount',
    ];
}
