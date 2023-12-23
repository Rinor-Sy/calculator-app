<?php

namespace App\Services;

use App\Interfaces\CalculatorInterface;
use App\Models\Calculations;
use App\Traits\ExpressionValidationTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use InvalidArgumentException;

class CalculatorService implements CalculatorInterface
{
    use ExpressionValidationTrait;

    /**
     * @param string $expression
     * @return JsonResponse
     */
    public function calculate(string $expression): JsonResponse
    {
        $expression = str_replace(['x', '×'], '*', $expression);
        $expression = str_replace('÷', '/', $expression);

        try {
            $this->validateExpression($expression);

            $evaluateExpression = $this->evaluateExpression($expression);

            if ($evaluateExpression === false) {
                throw new InvalidArgumentException('Invalid math expression!');
            }

            $expressionResult = $evaluateExpression;

            Calculations::create([
                'user_id' => auth()->user()->getAuthIdentifier(),
                'expression' => $expression,
                'result' => $expressionResult,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => sprintf('Failed to calculate expression %s: %s', $expression, $e->getMessage())
            ], 400);
        }

        return response()->json([
                'status' => 'success',
                'message' => 'Expression executed successfully.',
                'expression' => $expression,
                'result' => $expressionResult
            ]
        );
    }

    /**
     * @return mixed
     */
    public function calculations(): mixed
    {
        return Calculations::where('user_id', auth()->user()->getAuthIdentifier()) ?? [];
    }

    public function delete(): JsonResponse
    {
        $dataToDelete = Calculations::with('user')->where('user_id', auth()->user()->getAuthIdentifier())->delete();

        if ($dataToDelete) {
            return response()->json(['status' => 'success', 'message' => 'Successfully deleted all calculations data for user.']);
        }

        return response()->json(['status' => 'error', 'message' => 'Failed to delete data!'], 400);
    }
}
