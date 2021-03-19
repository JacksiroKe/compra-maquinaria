<?php

namespace App\Models;

use App\Models\Specific;
use App\Models\Type;
use App\Models\Deal;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'truck_mounted', 'type', 'title_structure', 'user'];
    
    /**
     * Get the category of the item
     *
     * @return \App\Type
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the tags of the item
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function specifics()
    {
        return $this->belongsToMany(Specific::class);
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
