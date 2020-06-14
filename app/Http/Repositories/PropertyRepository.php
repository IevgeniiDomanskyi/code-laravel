<?php

namespace App\Http\Repositories;

use Illuminate\Support\Str;
use App\Property;

class PropertyRepository
{
    public function all()
    {
        return Property::all();
    }

    public function byField(string $field, string $value)
    {
        return Property::where($field, $value)->get();
    }

    public function create(array $data)
    {
        $data['guid'] = Str::uuid()->toString();
        return Property::create($data);
    }
}
