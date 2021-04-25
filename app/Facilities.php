<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    public $table = 'facilities';
    public $fillable = [
        'name',
        'type',
    ];

    public function getItemByName($name){
        return $this->where('name', 'like', $name)->get();
    }
}
