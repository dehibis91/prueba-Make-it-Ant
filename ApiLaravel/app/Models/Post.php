<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "postdata";
    protected $fillable = [
        "userId",
        "id",
        "title",
        "body"
    ];
    public $timestamps = false;
}
