<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // 👈 instead of Model
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customers';

    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'phone_no',
        'email',
        'address',
        'city',
        'state',
        'pin_code',
        'password',
    ];

    protected $hidden = ['password', 'remember_token'];

    // Mutator for first_name
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = $value;

        if (isset($this->attributes['last_name'])) {
            $this->attributes['name'] = trim($value . ' ' . $this->attributes['last_name']);
        }
    }

    // Mutator for last_name
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = $value;

        if (isset($this->attributes['first_name'])) {
            $this->attributes['name'] = trim($this->attributes['first_name'] . ' ' . $value);
        }
    }


}
