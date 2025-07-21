<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Renewal extends Model
{
    use SoftDeletes;

     protected $fillable = [
        'user_id',
        'renewalplan',
        'utr_name',	
		'payment_date',

        'payment_amount',
        'fees_calculation_detail',
        'payment_remarks',
        'payment_attachment',

        'renewal_initaliated',
        'paymentrequest_initaliated',
        'paymentrequest_completed',
        'appointmentschedule_initaliated',

        'appointmentschedule_completed',
        'renewal_completed',
        'appointment_schedule_dates',
        'appointment_fixed_date',

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
        'grace_period_end',
        'status',
        'validity_period'
	
    ];

    protected $casts = [
    'appointment_schedule_dates' => 'array',
    ];
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
