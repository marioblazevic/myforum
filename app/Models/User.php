<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Roles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
        // DB::table('follows')->insert([
        //     'user_id' => 1,
        //     'following_user_id' => $user->id
        // ]);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
        // DB::table('follows')->where('following_user_id',$user->id)->delete();
    }

    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
        // if(DB::table('follows')->where('user_id',1)->where('following_user_id', $user->id)->exists()){
        //     return true;
        // }else{
        //     return false;
        // }
    }

    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function timeline()
    {
        $friends = $this->follows->pluck('id');
        return Post::whereIn('user_id',$friends)
                    ->withLikes()
                    ->get();
    }

    public function myTimeline()
    {
        return Post::where('user_id',$this->id)
                    ->withLikes()
                    ->latest()
                    ->get();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
