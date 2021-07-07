<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\askHim;

function brainEven()
{
    $name = askHim();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $num = rand(1, 1000);
        $answer = prompt("Question:" . $num);
        if ($answer !== 'yes' && $answer !== 'no') {
            $errorVar = ($num % 2 === 0) ? 'yes' : 'no';
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$errorVar}'");
            line("Let's try again, {$name}!");
            break;
        }

        line('Your answer: ' . $answer);
        $checkedN = checkIsEven($num, $answer);

        if ($checkedN === 'Correct!') {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$checkedN}'");
            line("Let's try again, {$name}!");
            break;
        }

        if ($i === 2) {
            line("Congratulations, {$name}!");
        }
    }
}

function checkIsEven($num, $answer)
{
    $y = 'yes';
    $n = 'no';
    if ($num % 2 === 0 && $answer === $y) {
        $a = 'Correct!';
    } elseif ($num % 2 !== 0 && $answer === $n) {
        $a = 'Correct!';
    } else {
        if ($answer === $y) {
            $a = $n;
        } else {
            $a = $y;
        }
    }
    return $a;
}
