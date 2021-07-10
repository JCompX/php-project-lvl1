<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Cli\startGame;

const TASK_COUNTER = 3;

function taskFlow(string $descriptionTask, array $arr): void
{
    $name = startGame();
    line($descriptionTask);
    foreach ($arr as [$showedQuestion, $trueAnswer]) {
        $userAnswer = prompt("Question: " . $showedQuestion);
        if ($trueAnswer == $userAnswer) {
            line("Your answer: {$userAnswer}");
            line('Correct!');
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$trueAnswer}'");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
