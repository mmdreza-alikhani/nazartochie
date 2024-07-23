<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\Followable;

class Category extends Model
{
    use HasFactory, Sluggable, Followable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($category) {
            $category->slug = SlugService::createSlug(Category::class, 'slug', $category->title);
        });
    }

    public function getIsActiveAttribute($is_active){
        return $is_active ? 'فعال' : 'غیرفعال';
    }

    protected $table = "categories";
    protected $guarded = [];
}
