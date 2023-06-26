<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tags';   //явне вказування звʼязанної таблиці
    protected $guarded = false;       //дозвіл на зсіни в таблиці
}
