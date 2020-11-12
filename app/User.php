<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notiification;
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'img', 'company', 'chinese_name', 'birthday', 'gender', 'address', 'serve_area', 'email', 'number_home', 'number_cellphone', 'serve_item', 'serve_experience', 'license', 'introduction', 'other', 'password', 'score', 'enabled', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function  certifications(){
        return $this->hasMany(Certification::class);
    }

    public function scoreHistory(){
        return $this->hasMany(scoreHistory::class);
    }

    public function notifications(){
         return $this->hasMany(Notification::class);
    }
}
