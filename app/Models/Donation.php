<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
    'receipt_no',
    'payment_type',
    'amount',
    'payment_date',
    'upload_payment_receipt',
    'remark','status','send_by'
    ];
}
