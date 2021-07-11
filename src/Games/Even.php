<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\taskFlow;

use const Brain\Games\Engine\TASK_COUNTER;

function brainEven(): void
{
    $descriptionTask = 'Answer "yes" if the number is even, otherwise answer "no".';
    $arr = [[]];
    taskFlow($descriptionTask, checkForTrue($arr));
}

function checkForTrue(array $arr): array
{
    for ($i = 0; $i < TASK_COUNTER; $i++) {
        $arr[$i][0] = rand(1, 1000);
        $arr[$i][1] = ($arr[$i][0] % 2 === 0) ? 'yes' : 'no';
    }
    return $arr;
}
