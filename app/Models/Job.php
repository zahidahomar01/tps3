<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use View;


class Job extends Eloquent
{
    use HasFactory;
    protected $primaryKey = 'job_id';

    protected $fillable = [
        'job_name',
        'job_date', 
        'job_status',
        'job_remark',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'proj_id', 'proj_id');
    }
    
}