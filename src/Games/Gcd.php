<?php

namespace Brain\Games\GCD;

use function Brain\Games\Engine\taskFlow;

function gcd()
{
    $descriptionTask = 'Find the greatest common divisor of given numbers.';
    taskFlow($descriptionTask, genPairs());
}

function genPairs()
{
    $arr = [[]];
    $i = 0;
    for ($i = 0; $i < 3; $i++) {
        $int1 = rand(1, 100);
        $int2 = rand(1, 100);
        $arr[$i][0] = "{$int1} {$int2}";
        $arr[$i][1] = gcdGen($int1, $int2);
    }
    return $arr;
}

function gcdGen($a, $b)
{
    if ($a == 0 || $b == 0) {
        return abs(max(abs($a), abs($b)));
    }
    $r = $a % $b;
    return ($r != 0) ?
        gcdGen($b, $r) :
        abs($b);
}