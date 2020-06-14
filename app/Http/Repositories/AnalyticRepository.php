<?php

namespace App\Http\Repositories;

use Illuminate\Support\Str;
use App\Property;
use App\Analytic;

class AnalyticRepository
{
    public function all(Property $property)
    {
        return $property->analytics;
    }

    public function create(Property $property, array $data)
    {
        return $property->analytics()->create($data);
    }

    public function update(Property $property, Analytic $analytic, array $data)
    {
        $analytic->update($data);
        return $analytic;
    }
}
