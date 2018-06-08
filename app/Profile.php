<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // use Notifiable;

    protected $table = 'profiles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','headline', 'overview', 'profile_image','cover_image','company','role','start_date','end_date','industry','phone','phone_type','address'
    ];

    public function role()
    {
        return $this->hasOne('App\Profile_role');
    }

    public function industry()
    {
        return $this->hasOne('App\Profile_industry');
    }

    public $timestamps = true;
}
