<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationLog extends Model
{
    protected $fillable = [
    'user_id',
    'company',
    'location',
    'position',
];
}