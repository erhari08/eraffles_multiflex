<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transferfrompondy extends Model
{
     protected $fillable = [
'upload_registration',
'upload_lastreceipt',
'upload_aadharcard',
'upload_photo',
'upload_signature',
'upload_payreceipt',
'reciptno',
'payment_type',
'amount',
'payment_date',
'remark',
'send_by',
'status'
    ];
}
