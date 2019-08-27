<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ACCESS_ADMIN = 1;
    const ACCESS_USER = 2;
    const ACCESS_ADMINUNIT = 3;

    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'level', 'unit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'password', 'remember_token', 'level', 'unit'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'tpid', 'tpname'
    ];

    public function getTpIdAttribute()
    {
        $tp_aktif = TahunPelajaran::where('status', 1)->first();
        return $tp_aktif->id;
    }

    public function getTpNameAttribute()
    {
        $tp_aktif = TahunPelajaran::where('status', 1)->first();
        return $tp_aktif->name;
    }

    public function scopeAdmin($query)
    {
        return $query->where('level', static::ACCESS_ADMIN);
    }

    public function scopeUser($query)
    {
        return $query->where('level', static::ACCESS_USER);
    }

    public function isUser()
    {
        return $this->level == static::ACCESS_USER;
    }

    public function isAdmin()
    {
        return $this->level == static::ACCESS_ADMIN;
    }

    public function isAdminUnit()
    {
        return $this->level == static::ACCESS_ADMINUNIT;
    }

    public function calons()
    {
        return $this->hasMany(Calon::class, 'user_id');
    }
}
