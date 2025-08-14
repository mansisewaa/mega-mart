<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrochureRequest extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'company_name',
        'message',
    ];
}
