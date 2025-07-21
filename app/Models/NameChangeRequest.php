<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NameChangeRequest extends Model
{
    protected $fillable = [
    'new_name',
    'change_reason',
    'upload_registration',
    'upload_last_renewal',
    'upload_degree_certificate',
    'upload_gazette',
    'upload_aadhar',
    'upload_photo',
    'upload_signature',
    'receipt_no',
    'payment_type',
    'amount',
    'payment_date',
    'upload_payment_receipt',
    'remark',
    'status','send_by','datasheet'
    ];


}
