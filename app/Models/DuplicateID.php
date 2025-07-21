<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuplicateID extends Model
{
     protected $fillable = [
        'upload_payreceipt',
        'upload_photo',
        'upload_signature',
        'receiptno',
        'payment_type',
        'payment_amount',
        'payment_date',
        'mobile',
        'email',
        'blood_group',
        'dob',
        'paddress',
        'remarks',
        'send_by',
        'status'
    ];
}
