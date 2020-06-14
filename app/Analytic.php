<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analytic extends Model
{
    protected $table = 'property_analytics';

    protected $fillable = ['property_id', 'analytic_type_id', 'value'];

    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public function type()
    {
        return $this->belongsTo('App\AnalyticType', 'analytic_type_id');
    }
}
