<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user',
        'status',
        'severity',
        'image',
        'reported_for_user_id',
    ];
}
