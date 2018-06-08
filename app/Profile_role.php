<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile_role extends Model
{
    protected $table = 'profile_roles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_text'
    ];

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
