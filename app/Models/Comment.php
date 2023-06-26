<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';       //явне вказування звʼязанної таблиці
    protected $guarded = false;          //дозвіл на зміни в таблиці

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
