<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roon extends Model
{
    public $table = 'rooms';
    
    public $fillable = [
        'hotel_id',
        'name',
        'acreage',
        'adult_quantity',
        'child_quantity',
        'queen_bed',
        'extra_bed',
        'image',
        'price',
        'min_price',
        'active',
        'description',
        'seo_image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'unit',
        'active',
        'is_bidding',
        'bidding_min_price', 'inclusions'
    ];

    public function facility(){
        return $this->belongsToMany(Facilities::class);
    }
}
