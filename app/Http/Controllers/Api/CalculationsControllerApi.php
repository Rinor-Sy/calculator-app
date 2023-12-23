<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalculateRequest;
use App\Services\CalculatorService;
use Illuminate\Http\JsonResponse;

class CalculationsControllerApi extends Controller
{
    /**
     * @param CalculatorService $calculatorService
     */
    public function __construct(protected CalculatorService $calculatorService)
    {
    }

    /**
     * @return JsonResponse
     */
    public function getUserCalculations(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'user_id' => auth()->user()->getAuthIdentifier(),
            'data' => $this->calculatorService->calculations()->get()
        ]);
    }

    /**
     * @param CalculateRequest $request
     * @return JsonResponse
     */
    public function calculate(CalculateRequest $request): JsonResponse
    {
        return $this->calculatorService->calculate($request->input('expression'));
    }

    /**
     * @return JsonResponse
     */
    public function delete(): JsonResponse
    {
        return $this->calculatorService->delete();
    }
}
