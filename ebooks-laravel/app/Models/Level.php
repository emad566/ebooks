<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFctory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Level extends Model
{
    protected $table = 'levels';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'level_name'
    ];

    public function deps()
    {
        return $this->hasMany('App\Models\Dep', 'level_id', 'id');
    }

    public function books()
    {
        return $this->hasMany('App\Models\ViewBook', 'level_id', 'id');
    }

}

