<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFctory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Book extends Model
{

    protected $table = 'books';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'book_title',
        'teacher_name',
        'book_path',
        'download_count',
        'dep_id'
    ];



}

