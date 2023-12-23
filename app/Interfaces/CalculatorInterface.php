<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface CalculatorInterface
{
    public function calculate(string $expression): JsonResponse;

    public function calculations(): mixed;

    public function delete(): JsonResponse;
}
