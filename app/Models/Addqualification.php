<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addqualification extends Model
{
    protected $fillable = [
'upload_ccc',
'upload_marksheet',
'upload_oldtc',
'upload_photot',
'upload_ppc',
'upload_aadhar',
'upload_signature',
'upload_payreceipt',
'qualification',
'dateofobtaing',
'receiptno',
'payment_type',
'payment_amount',
'payment_date',
'remarks',
'send_by','status','data_sheet'
];

}
