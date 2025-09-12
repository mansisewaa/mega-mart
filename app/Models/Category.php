<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','code', 'slug','file'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $prefix = strtoupper(substr($category->name, 0, 3));     // BOO
            $date   = now()->format('ym');                          // 2508 (Aug 2025)
            $count  = self::whereYear('created_at', now()->year)
                          ->whereMonth('created_at', now()->month)
                          ->count() + 1;

            $serial = str_pad($count, 2, '0', STR_PAD_LEFT);        // 01, 02...

            $category->code = $prefix . $date . $serial;   // BOO250801
        });
    }
}
