<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'contents';
    protected $fillable = [
        'menu_id',
        'submenu_id',
        'banner_image',
        'content',
        'file',
        'status'
    ];
}
