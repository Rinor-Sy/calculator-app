<?php

namespace App\Traits;

use DivisionByZeroError;
use Exception;
use InvalidArgumentException;
use ParseError;

trait ExpressionValidationTrait
{
    /**
     * @throws Exception
     */
    private function validateExpression($expression): void
    {
        $singleNumberPattern = '/^(-?[0-9]+(\.[0-9]+)?)$/';

        if (preg_match($singleNumberPattern, $expression)) {
            throw new InvalidArgumentException('Standalone numbers are not allowed in expression!');
        }

        if (!$this->checkForBalancedParentheses($expression)) {
            throw new InvalidArgumentException('Unbalanced parentheses in the expression.');
        }
    }


    /**
     * @param string $expression
     * @return bool
     */
    private function checkForBalancedParentheses(string $expression): bool
    {
        $count = 0;

        foreach (str_split($expression) as $char) {

            $count += ($char === '(') ? 1 : (($char === ')') ? -1 : 0);

            if ($count < 0) {
                return false;
            }
        }

        return $count === 0;
    }

    /**
     * @param string $expression
     * @return bool|string
     */
    private function evaluateExpression(string $expression): bool|string
    {
        $expression = str_replace(' ', '', $expression);

        try {
            return @eval("return $expression;");
        } catch (ParseError|DivisionByZeroError|InvalidArgumentException|Exception $e) {
            return false;
        }
    }
}
