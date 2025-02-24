<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    
    public function incomes(): HasMany{
        return $this->hasMany(Income::class);
    }

    public function outcomes(): HasMany{
        return $this->hasMany(Spending::class);
    }

}
