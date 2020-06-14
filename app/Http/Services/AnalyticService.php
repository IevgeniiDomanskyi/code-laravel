<?php

namespace App\Http\Services;

use App\Http\Services\PropertyService;
use App\Http\Repositories\AnalyticRepository;
use App\Property;
use App\Analytic;

class AnalyticService
{
    protected $propertyService;
    protected $analyticRepository;

    public function __construct(PropertyService $propertyService, AnalyticRepository $analyticRepository)
    {
        $this->propertyService = $propertyService;
        $this->analyticRepository = $analyticRepository;
    }

    public function all(Property $property)
    {
        return $this->analyticRepository->all($property);
    }

    public function create(Property $property, array $input)
    {
        return $this->analyticRepository->create($property, $input);
    }

    public function update(Property $property, Analytic $analytic, array $input)
    {
        return $this->analyticRepository->update($property, $analytic, $input);
    }

    public function summary($field, $value)
    {
        $allProperties = $this->propertyService->all();
        $properties = $this->propertyService->byField($field, $value);

        $data = [];
        foreach ($properties as $property) {
            foreach ($property->analytics as $analytic) {
                if ($analytic->type->is_numeric) {
                    if ( ! isset($data[$analytic->type->id])) {
                        $data[$analytic->type->id]['name'] = $analytic->type->name;
                        $data[$analytic->type->id]['units'] = $analytic->type->units;
                    }

                    $data[$analytic->type->id]['values'][] = $analytic->value; 
                }
            }
        }
        
        $result = [];
        foreach ($data as $type_id => $info) {
            $result[$info['name']] = [
                'min' => min($info['values']).$info['units'],
                'max' => max($info['values']).$info['units'],
                'avg' => round(array_sum($info['values']) / count($info['values']), 2).$info['units'],
            ];
        }

        $result['with_value_percent'] = round(count($properties) * 100 / count($allProperties));
        $result['without_value_percent'] = 100 - $result['with_value_percent'];

        return $result;
    }
}