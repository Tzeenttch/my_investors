<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spending extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'bank','category', 'amount'];


    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

}
