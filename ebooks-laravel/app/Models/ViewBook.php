<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFctory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ViewBook extends Model
{

    protected $table = 'view_books';
    protected $fillable = [
        'id',
        'book_title',
        'teacher_name',
        'book_path',
        'download_count',
        'dep_id',
        'fac_id',
        'level_id',
    ];

    public function level()
    {
        return $this->hasOne('App\Models\Level', 'id', 'level_id');
    }

    public function fac()
    {
        return $this->hasOne('App\Models\Fac', 'id', 'fac_id');
    }

    public function dep()
    {
        return $this->hasOne('App\Models\Fac', 'id', 'dep_id');
    }

}

