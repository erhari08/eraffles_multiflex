<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Restoration extends Model
{
        use SoftDeletes;

        protected $fillable = [
        'user_id',
        'utr_name',	
		'payment_date',
        'payment_amount',
        'fees_calculation_detail',

        'payment_remarks',
        'payment_attachment',
        'restoration_initaliated',
        'paymentrequest_initaliated',
        'paymentrequest_completed',

         'restoration_completed',
         'present_professional_address',
         'pres_from_date',
         'pres_to_date',
         'past_professional_address',

         'past_from_date',
         'past_to_date',
         'last_ppc_certificate',
         'last_paymentreceipt',
         'working_proof',

         'cpe_certificate',
         'professional_proof',
         'status',
         'validity_period'
	
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
