<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'client',
        'researcher',
        'title',
        'description',
        'vulnerability_type',
        'severity',
        'status',
        'image',
    ];
}
