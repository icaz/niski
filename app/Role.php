<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany('App\User');
    }

    
}
