<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterGender extends Model
{
    const MALE_USER = '男性';
    const FEMALE_USER = '女性';
    const CREATED_AT = null;
    const UPDATED_AT = null;

    use HasFactory;

}
