<?php

namespace App\Models;

use App\Models\Deal;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Truckmake extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['name', 'user'];

   /**
     * Get the tags of the item
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

   /**
     * Get the tags of the item
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
