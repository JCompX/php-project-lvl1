<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\taskFlow;

function calculator(): void
{
    $descriptionTask = 'What is the result of the expression?';
    taskFlow($descriptionTask, genExpression());
}

function genExpression(): array
{
    $MathExpression = [[]];
    $i = 0;
    for ($i = 0; $i < 3; $i++) {
        $firstVal = rand(50, 100);
        $secondVal = rand(1, 49);
        $mathOperator = '+-*';
        $selectedMathOperator = substr(str_shuffle($mathOperator), 0, 1);
        $MathExpression[$i][0] = "{$firstVal} {$selectedMathOperator} {$secondVal}";
        switch ($selectedMathOperator) {
            case '-':
                $MathExpression[$i][1] = $firstVal - $secondVal;
                break;
            case '+':
                $MathExpression[$i][1] = $firstVal + $secondVal;
                break;
            case '*':
                $MathExpression[$i][1] = $firstVal * $secondVal;
                break;
        }
    }
    return $MathExpression;
}
