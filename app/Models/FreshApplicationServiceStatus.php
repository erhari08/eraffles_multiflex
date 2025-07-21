<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FreshApplicationServiceStatus extends Model
{
    protected $table = 'fresh_application_service_statuses';

     protected $fillable = [
        'user_id',
        'newapplication_initaliated',
        'newapplication_completed',
        'paymentrequest_initaliated',

        'paymentrequest_completed',
        'appointmentschedule_initaliated',
        'appointmentschedule_completed',
        'PPC_idgenaration_completed',

        'status',
        'payment_amount',
        'utr_name',	
		'payment_date',

        'payment_amount',
        'payment_remarks',
        'payment_attachment',	
        'appointment_schedule_dates',

        'appointment_fixed_date',
        'validity_period',
	
    ];

      public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
    'appointment_schedule_dates' => 'array',
    ];
}
