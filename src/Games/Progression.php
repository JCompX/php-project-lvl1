<?php

namespace Brain\Games\PGS;

use function Brain\Games\Engine\taskFlow;

function progression() : void
{
    $descriptionTask = 'What number is missing in the progression?';
    taskFlow($descriptionTask, genPairs());
}

function genPairs() : array
{
    $a = 1;
    $b = 40;
    $d = 3;
    $arrValues = [[]];
    for ($i = 0; $i < 3; $i++) {
        $randIndx = rand(0, 13);
        $startArr = range($a, $b, $d);
        $arrValues[$i][0] = array_slice($startArr, rand(-8, -13), rand(5, 8));
        $countArrValue = (count($arrValues[$i][0]) - 1);
        $magicIndex = rand(0, $countArrValue);
        $changedValue = $arrValues[$i][0][$magicIndex];
        $arrValues[$i][0][$magicIndex] = '..';
        $string = implode(" ", $arrValues[$i][0]);
        $arrValues[$i][0] = $string;
        $arrValues[$i][1] = $changedValue;
    }
    return $arrValues;
}
