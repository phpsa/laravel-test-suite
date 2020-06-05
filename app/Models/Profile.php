<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'gender', 'dob'
    ];

    protected $casts = [
        'user_id' => 'integer'
    ];

    public const GENDERS = [
        0 => 'other',
        1 => 'male',
        2 => 'female'
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the avatar for the profile.
     */
    public function avatar()
    {
        return $this->hasOne(File::class);
    }

    public function getGenderAttribute()
    {
        return self::GENDERS[ $this->attributes['gender'] ];
    }

    public function setGenderAttribute($value)
    {
        if (! is_numeric($value)) {
            $value = array_search($value, self::GENDERS);
        }
        $this->attributes['gender'] = $value;
    }
}
