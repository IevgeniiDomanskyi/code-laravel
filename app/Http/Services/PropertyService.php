<?php

namespace App\Http\Services;

use App\Http\Repositories\PropertyRepository;

class PropertyService
{
    protected $propertyRepository;

    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function all()
    {
        return $this->propertyRepository->all();
    }

    public function byField(string $field, string $value)
    {
        return $this->propertyRepository->byField($field, $value);
    }

    public function create(array $input)
    {
        return $this->propertyRepository->create($input);
    }
}