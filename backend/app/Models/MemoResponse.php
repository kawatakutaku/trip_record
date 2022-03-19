<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemoResponse extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * 1つのメモの返信が1ユーザーに紐づく(従属する)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 1つのメモの返信が1ユーザーに紐づく(従属する)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function memo(): BelongsTo
    {
        return $this->belongsTo(Memo::class);
    }

    /**
     * 1つのメモの返信に対して複数のいいねが紐づく
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function memoResponseGoods(): HasMany
    {
        return $this->hasMany(MemoResponseGood::class);
    }
}
