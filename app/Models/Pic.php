<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    use HasFactory;

       protected $primaryKey = 'pic_id';
    protected $fillable =
        ['
        pic_id',
        'pic_name',
        'pic_hp',
        'pic_email',
        'proj_id'

    ];

    public function project(){
        return $this->hasMany((\App\Models\Project::class));
    }
}
