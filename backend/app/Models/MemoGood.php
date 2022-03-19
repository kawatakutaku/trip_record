<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemoGood extends Model
{
    use HasFactory, SoftDeletes;

    const MEMO_LIKE = 'memoLike';

    /**
     * 1メモいいねに対して1メモが紐づく
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function memo(): BelongsTo
    {
        return $this->belongsTo(Memo::class);
    }

    /**
     * 1メモいいねに対して1ユーザーが紐づく
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
