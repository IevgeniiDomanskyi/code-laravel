<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AnalyticService;
use App\Http\Requests\AnalyticCreateRequest;
use App\Http\Resources\AnalyticResource;
use App\Property;
use App\Analytic;

class AnalyticController extends Controller
{
    protected $analyticService;

    public function __construct(AnalyticService $analyticService)
    {
        $this->analyticService = $analyticService;
    }

    public function all(Request $request, Property $property)
    {
        $result = $this->analyticService->all($property);
        return response()->result(AnalyticResource::collection($result), __('Analytic list'));
    }

    public function create(AnalyticCreateRequest $request, Property $property)
    {
        $input = $request->only(['analytic_type_id', 'value']);

        $result = $this->analyticService->create($property, $input);
        return response()->result(new AnalyticResource($result), __('Analytic was created'));
    }

    public function update(AnalyticCreateRequest $request, Property $property, Analytic $analytic)
    {
        $input = $request->only(['analytic_type_id', 'value']);

        $result = $this->analyticService->update($property, $analytic, $input);
        return response()->result(new AnalyticResource($result), __('Analytic was updated'));
    }

    public function suburbSummary(Request $request, $suburb)
    {
        $result = $this->analyticService->summary('suburb', $suburb);
        return response()->result($result, __('Analytic summary for suburb'));
    }

    public function stateSummary(Request $request, $state)
    {
        $result = $this->analyticService->summary('state', $state);
        return response()->result($result, __('Analytic summary for state'));
    }

    public function countrySummary(Request $request, $country)
    {
        $result = $this->analyticService->summary('country', $country);
        return response()->result($result, __('Analytic summary for country'));
    }
}
