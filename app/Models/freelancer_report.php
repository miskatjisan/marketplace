<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class freelancer_report extends Model
{
    use HasFactory;
    protected $fillable=['user_id','buyer_id','job_id','report_type','report_summery'];
    
}
