<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $table = "bookmarks";
    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
