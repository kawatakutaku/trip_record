<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;

    protected $table = "memos";

    const MEMO_ID_NAME = "memo";
    const MULTIPLE_MEMOS = "memos";
    const MEMO_IMG = "img";
    const MEMO_MEMO = "memo";
}
