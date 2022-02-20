<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    const BLOG_ID_NAME = 'blog';
    const MULTIPLE_BLOGS = 'blogs';
    const BLOG_MESSAGE = 'message';
}
