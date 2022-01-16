<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // TODO Model内で何をしているのかを調べる必要あり
    use HasFactory;

    protected $table = 'books';
}
