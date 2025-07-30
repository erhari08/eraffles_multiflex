<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grn extends Model
{
     protected $fillable = [
         'grn_doc', 'grn_date', 'grn_number',
        'supplier_invoice_no', 'supplier_invoice_date', 'supplier_name',
        'supplier_address', 'specification'
    ];

    
}
