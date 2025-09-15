<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrochureFile extends Model
{
    protected $table = 'brochure_files';
    protected $fillable = ['name', 'file','status'];
}
