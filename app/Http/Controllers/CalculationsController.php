<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRequest;
use App\Services\CalculatorService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class CalculationsController extends Controller
{
    /**
     * @param CalculatorService $calculatorService
     */
    public function __construct(protected CalculatorService $calculatorService)
    {
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('calculation-history', ['userCalcData' => $this->calculatorService->calculations()->paginate(10) ?? []]);
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('calculator');
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
