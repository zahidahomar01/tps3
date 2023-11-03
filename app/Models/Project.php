<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;
use View;


class Project extends Eloquent
{
    use HasFactory;

    protected $primaryKey = 'proj_id';
    protected $fillable = [
        'proj_name',
        'proj_status', 
        'proj_date'
    ];

    // public function pic(): BelongsTo
    // {
    //     return $this->belongsTo(Pic::class, 'proj_id', 'pic_id');
    // }
    public function pic()
    {
        return $this->belongsTo(Pic::class, 'pic_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'proj_id');
    }
    
}
