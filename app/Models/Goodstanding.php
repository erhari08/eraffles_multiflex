<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goodstanding extends Model
{
    protected $fillable = [
            'upload_ppc',
            'upload_lastrenewalreceipt',
            'upload_degree',
            'upload_aadhar',
            'upload_photo',
            'upload_payreceipt',
            'receiptno',
            'payment_type',
            'payment_amount',
            'payment_date',
            'remarks',
            'send_by',
            'status'

    ];
}
