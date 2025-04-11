<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = [
        "title",
        "slug",
        "excerpt",
        "image",
        "body",
        "category_id",
        "user_id"
        ];
    protected $guarded = ["id"];

    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class,"category_id");
    }
    
    public function author()
    {
        return $this->belongsTo(User::class,"user_id");
    }

        /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title','LIKE','%'.$search.'%')
                            ->orWhere('body','LIKE','%'.$search.'%');
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use($category){
                $query->where('slug',$category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use($author){
                $query->where('username', $author);
            });
        });
    }

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
