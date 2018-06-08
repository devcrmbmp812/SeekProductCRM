<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile_industry extends Model
{
    protected $table = 'profile_industries';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'industry_text'
    ];

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
