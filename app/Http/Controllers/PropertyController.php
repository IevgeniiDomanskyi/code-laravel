<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PropertyService;
use App\Http\Requests\PropertyCreateRequest;
use App\Http\Resources\PropertyResource;

class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function create(PropertyCreateRequest $request)
    {
        $input = $request->only(['suburb', 'state', 'country']);

        $result = $this->propertyService->create($input);
        return response()->result(new PropertyResource($result), __('Property was created'));
    }
}
