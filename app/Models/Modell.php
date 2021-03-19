<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Make;
use App\Models\Deal;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Modell extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'make', 'category', 'user'];
    /**
     * Get the category of the item
     *
     * @return \App\Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Get the category of the item
     *
     * @return \App\Category
     */
    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    /**
     * Get the tags of the item
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
