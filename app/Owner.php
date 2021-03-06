<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $guarded = [];

    public function animals()
    {
    	return $this->hasMany(Animal::class);
    }

    public function getAnimals()
    {
        return $this->animals->take(6);
    }

}
