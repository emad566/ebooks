<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFctory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Dep extends Model
{

    protected $table = 'deps';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'dep_name',
        'fac_id',
        'level_id'
    ];

    public function books()
    {
        return $this->hasMany('App\Models\ViewBook', 'dep_id', 'id');
    }

    public function level()
    {
        return $this->hasOne('App\Models\Level', 'id', 'level_id');
    }

    public function fac()
    {
        return $this->hasOne('App\Models\Fac', 'id', 'fac_id');
    }

}

