<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
      protected $fillable = [
        'po_doc',
        'customer_name',
        'po_no',
        'po_date',
        'work_order_ref',
        'quotation_ref',
        'state_name',
        'state_code',
        'place_of_supply',
        'supplier_GSTIN',
    ];
}
