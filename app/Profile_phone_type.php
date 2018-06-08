<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile_phone_type extends Model
{
    protected $table = 'profile_phone_types';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_type_text'
    ];
}
