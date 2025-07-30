<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobcard extends Model
{

     protected $fillable = [
'jobcard_no',
'job_name',
'tot_kgs',
'wastage',
'total',
'formOfOutput',
'wtperpouch',
'tot_roll_wt',
'printing',
'lamination',
'folding',
'pouching',
    ];




}
