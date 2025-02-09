<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    //It is necessary to use fillable for mass assignment.
    protected $fillable = ['date', 'category', 'amount'];

}
