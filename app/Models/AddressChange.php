<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressChange extends Model
{
    protected $fillable = [
    'new_address_1',
    'new_address_2',
    'new_address_3',
    'new_pin_code',
    'prev_org_name',
    'prev_org_address',
    'present_org_name',
    'present_org_address',
    'upload_residence',
    'upload_photo',
    'upload_signature',
    'upload_bloodgroup',
    'status',
    'send_by'
];
}
