<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalyticType extends Model
{
    protected $fillable = ['name', 'units', 'is_numeric', 'num_decimal_places'];
}
