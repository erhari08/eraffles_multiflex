<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuplicatePPC extends Model
{
    protected $fillable = [
'upload_ppc',
'upload_lastrenewalreceipt',
'upload_provisional',
'upload_fircopy',
'upload_proofdamage',
'upload_aadhar',
'upload_photo',
'upload_signature',
'upload_payreceipt',
'bloodgroup',
'receiptno',
'mobile',
'address1',
'address2',
'address3',
'pincode',
'payment_type',
'payment_amount',
'payment_date',
'remarks',
'send_by',
'status','data_sheet'
    ];
}
