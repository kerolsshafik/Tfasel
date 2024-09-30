<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function categoey()
    {

        return $this->belongsTo(Category::class);
    }



    public function getWishlistAttribute()
    {
        // Custom logic to generate the 'wishlist' value
        // For example, retrieving a related wishlist or some computed value
        return 'This is the Wishlist attribute'; // Replace this with actual logic
    }


}
