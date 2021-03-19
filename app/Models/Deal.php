<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Make;
use App\Models\Modell;
use App\Models\Type;
use App\Models\Truckmake;
use App\Models\Specifics;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Deal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'deal_type',
        'type',
        'category',
        'description',
        'year',
        'make',
        'modell',
        'city',
        'state',
        'country',
        'price',
        'price_currency',
        'premium',
        'sn',
        'url',
        'picture',
        'auc_enddate',
        'auc_lot',
        'company',
        'auctioneer',
        'truck_year',
        'truckmake',
        'truck_model',
        'truck_sn',
        'user'
    ];

    public function __construct(array $attributes = array()) 
    {
        $this->setFillable();
        parent::__construct($attributes);
    }

    public function setFillable()
    {
        $speclist = DB::table('specifics')->get();

        foreach ($speclist as $spec) {
            // print_r($this->fillable);exit();
            array_push($this->fillable, $spec->column_name);
            if ($spec->unit != '') {
                array_push($this->fillable, $spec->column_name.'_unit');
            }
        }
    }

    /**
     * Get the category 
     *
     * @return \App\Type
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the category 
     *
     * @return \App\Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the make
     *
     * @return \App\Make
     */
    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    /**
     * Get the Modell
     *
     * @return \App\Modell
     */
    public function Modell()
    {
        return $this->belongsTo(Modell::class);
    }

    /**
     * Get the Modell
     *
     * @return \App\Truckmake
     */
    public function truckmake()
    {
        return $this->belongsTo(Truckmake::class);
    }

    /**
     * Get the Modell
     *
     * @return \App\Auctioneer
     */
    public function auctioneer()
    {
        return $this->belongsTo(Auctioneer::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the path to the picture
     *
     * @return string
     */
    public function path()
    {
        return "/storage/{$this->picture}";
    }
}
