<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $table = 'users';       //явне вказування звʼязанної таблиці
    protected $guarded = false;       //дозвіл на зсіни в таблиці

    const ROLE_ADMIN = 1;
    const ROLE_READER = 0;

    public static function getRoles() {
        return [
            self::ROLE_ADMIN => "Адмін",
            self::ROLE_READER => "Читач",
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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
        'password' => 'hashed',
    ];

    public function likedPosts() {
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }    //I connect users and posts width foreign key

    public function comments() {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
}











