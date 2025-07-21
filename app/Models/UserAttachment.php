<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAttachment extends Model
{
    protected $fillable = [
        'user_id',
        'Photo_file_path',
        'Signature_file_path',
        'AddressProof_file_path',
        'AadharProof_file_path',
        'InstituteIDCard_file_path',
        'VoterIDCard_file_path',
        'DrivingLicense_file_path',
        'DegreeDiplomaCertificate_file_path',
        'Provisional_file_path',
        'CourseCompletion_file_path',
        'AllMarksheet_file_path',
        'TransferCertificate_file_path',
        'SSLCMarksheet_file_path',
        'HSCMarksheet_file_path',
        'Affidavit_file_path',
        'ppc_certificate',
        'ppc_idcard_front',
        'ppc_idcard_back',
        'ppc_fresh_paymentreceipt'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

