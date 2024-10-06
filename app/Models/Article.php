<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use  InteractsWithMedia;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'category_id',
        'is_published',
    ];

    protected $appends = ['Wishlist',];


    // Automatically generate the slug when creating or updating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });

        static::updating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }

    public function categoey()
    {

        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('big_images')
            ->singleFile();
        // Set the path for small images
        $this->addMediaCollection('small_images');

        // Set the path for videos
        $this->addMediaCollection('videos')            ->singleFile()
        ;
    }
    public function getWishlistAttribute()
    {
        // Custom logic to generate the 'wishlist' value
        \Log::info('start' . now());
        return auth()->check() && Wishlist::where('user_id', auth('api')->id())
        ->where('media_id', $this->media_id) // استخدم الـ id الخاص بالـ media الحالية
        ->exists();
        // For example, retrieving a related wishlist or some computed value
    }


}
