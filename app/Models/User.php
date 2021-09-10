<?php

namespace App\Models;

use App\Mail\newUserRegistraionMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Create a profile for user when they register in platform
    protected static function boot(){

        parent::boot();

        static::created(function ($user){
            $user->profile()->create([
                'title' => $user->username
            ]);
            Mail::to($user->email)->send(new newUserRegistraionMail());
        });

    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function following(){
        return $this->belongsToMany(Profile::class);
    }

    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at','desc');
    }
}
