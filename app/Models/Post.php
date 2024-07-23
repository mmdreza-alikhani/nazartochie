<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model implements Viewable
{
    use HasFactory, Sluggable, InteractsWithViews;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected static function boot(): void
    {
        parent::boot();

        static::updating(function ($post) {
            $post->slug = SlugService::createSlug($post, 'slug', $post->title);
        });
    }

    protected $table = "posts";
    protected $guarded = [];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->where('approved', 1);
    }

    public function reactions($reaction_id = '0')
    {
        return $reaction_id != '0' ? $this->hasMany(PostReaction::class)->where('reaction_id', $reaction_id): $this->hasMany(PostReaction::class);
    }

    public function activeUsers(): HasMany
    {
        return $this->comments()->with(['user'])->latest()->take(3);
    }

    public function lastComment(): HasMany
    {
        return $this->comments()->latest()->take(1);
    }

    public function getIsActiveAttribute($status): string
    {
        return $status ? 'فعال' : 'غیرفعال';
    }

    public function getCloseFriendsAttribute($close_friends): string
    {
        return $close_friends ? 'نمایش برای دوستان' : 'نمایش برای همه';
    }
}
