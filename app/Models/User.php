<?php

namespace App\Models;

use App\Models\WorkExprience;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function workExperiences(){
        return $this->hasMany(WorkExprience::class);
    }

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function educations(){
        return $this->hasMany(Education::class);
    }

    public function skills(){
        return $this->hasMany(Skill::class);
    }

    public function extraSkills(){
        return $this->hasMany(ExtraSkill::class);
    }

    public function hobbies(){
        return $this->hasMany(Hobby::class);
    }

    public function languagues(){
        return $this->hasMany(Languague::class);
    }

    public function socialMedia(){
        return $this->hasMany(socialMedia::class);
    }
}
