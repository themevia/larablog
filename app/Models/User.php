<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail,
    Illuminate\Database\Eloquent\Factories\HasFactory,
    Illuminate\Database\Eloquent\SoftDeletes,
    Illuminate\Foundation\Auth\User as Authenticatable,
    Illuminate\Notifications\Notifiable,
    Laravel\Fortify\TwoFactorAuthenticatable,
    Laravel\Jetstream\HasProfilePhoto,
    Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'tags',
        'roles',
        'permissions'
    ];

    /**
     * The attributes that should be hidden for arrays.
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
     * The attributes that should be cast to native types.
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

    public function post()
    {
        return $this->hasMany(Post::class,'author_id');
    }

    public function reaction()
    {
        return $this->hasMany(Reaction::class);
    }

    public function totalUser()
    {
        return $this->all()->count();
    }

    public function lastWeekTotalUser()
    {
        return $this->where('created_at','>=',Carbon::now()->subDays(7))->count();
    }
}
