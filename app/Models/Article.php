<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
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
        $this->addMediaCollection('big_images')->singleFile(); // Only one big image per article
        $this->addMediaCollection('small_images'); // Multiple small images per article
        $this->addMediaCollection('videos');                    // For the videos

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
