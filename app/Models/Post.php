<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $with = [
        'category'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function searchable(): bool
    {
        return $this->published || $this->category->searchable;
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'category' => [
                'name' => $this->category->name,
                'slug' => $this->category->slug,
            ]
        ];
    }
    public function scopeSearch($query,$term)
    {
        $term = "%$term%";

        $query->where(function($query) use ($term){
            $query->where('title','like',$term)
                ->orWhere('slug','like',$term)
                ->orWhere('content','like',$term);
        });
    }
}
