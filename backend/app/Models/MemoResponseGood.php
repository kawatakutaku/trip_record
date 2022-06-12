<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemoResponseGood extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * 1つのメモに対して複数の返信が紐づく
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 1つのメモに対して複数の返信が紐づく
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function memoResponse(): BelongsTo
    {
        return $this->belongsTo(MemoResponse::class);
    }
}
