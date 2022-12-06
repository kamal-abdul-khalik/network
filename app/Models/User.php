<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\FollowingTrait;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, FollowingTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gravatar($size = 100)
    {
        $default = 'mm';
         return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    //untuk membuat status
    public function makeStatus($string)
    {
        $this->statuses()->create([
            'body' => $string,
            'identifier' => Str::slug($this->id . Str::random(31))
        ]);
    }

    //untuk menampilkan user yang mengikuti kita
    public function follows()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id')->withTimestamps();
    }

    //untuk menampilkan user yang kita follow
    public function followers()
    {
        return $this->belongsToMany(User::class,'follows','following_user_id','user_id')->withTimestamps();
    }

    //untuk menampilkan status di timeline
    public function timeline()
    {
        $following = $this->follows->pluck('id');
        return Status::whereIn('user_id',  $following)
                            ->orWhere('user_id', $this->id)
                            ->latest()
                            ->get();
    }
}
