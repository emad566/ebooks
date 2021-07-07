<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFctory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Fac extends Model
{

    protected $table = 'facs';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'fac_name',
        'level_num',
    ];

    public function deps()
    {
        return $this->hasMany('App\Models\Dep', 'fac_id', 'id');
    }

    public function books()
    {
        return $this->hasMany('App\Models\ViewBook', 'fac_id', 'id');
    }

}

