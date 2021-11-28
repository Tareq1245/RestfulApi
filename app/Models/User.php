<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    /**
    * Laravel will use the "Class Name"
    * as the table name if not explicitly declared
    * on the model. This causes Laravel to automatically
    * assume sellers as the table name in the Query.
    * to resolve this add the folloeing extending Model
    */
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setNameAttribute($name){
      $this->attributes['name'] = strtolower($name);
    }

    public function getNameAttribute($name){
      return ucwords($name);
    }

    public function setEmailAttribute($email){
      $this->attributes['email'] = strtolower($email);
    }

    public function isVerified()
    {
      return $this->verified == User::VERIFIED_USER;
    }

    public function isAdmin()
    {
      return $this->admin == User::ADMIN_USER;
    }

    public static function generateVerificationCode()
    {
      return Str::random(40);
    }
}
