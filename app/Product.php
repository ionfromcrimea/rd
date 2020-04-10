<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    public function getCategory() {
//        return Category::find($this->category_id);
//    }

    protected $fillable = [
        'name', 'cod', 'price', 'category_id', 'description', 'image', 'hit', 'new', 'recommend', 'count'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount() {
        return $this->price * $this->pivot->count;
    }

    public function isHit()
    {
        return $this->hit === 1;
    }

    public function isNew()
    {
        return $this->new === 1;
    }

    public function isRecommend()
    {
        return $this->recommend === 1;
    }
}
