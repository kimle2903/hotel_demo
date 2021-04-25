<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    public $table = 'amenities';
    public $fillable = [
        'name','status'
    ];


    public function getItemByName($name){
        return $this->where('name', 'like', $name)->get();
    }
    public function hotel()
        {
            return $this->belongsToMany(Hotel::class);
        }
}
