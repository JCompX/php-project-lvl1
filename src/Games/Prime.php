<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\taskFlow;

function prime()
{
    $descriptionTask = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    taskFlow($descriptionTask, genPairs());
}

function genPairs()
{
    $arrValues = [[]];
    for ($i = 0; $i < 3; $i++) {
        $d = rand(2, 500);
        $flag = primeCheck($d);
        if ($flag == 1) {
            $trueAnswer = 'yes';
        } else {
            $trueAnswer = 'no';
        }
        $arrValues[$i][0] = $d;
        $arrValues[$i][1] = $trueAnswer;
    }
    return $arrValues;
}

function primeCheck($number)
{
    if ($number == 1) {
        return 0;
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            return 0;
        }
    }
    return 1;
}
