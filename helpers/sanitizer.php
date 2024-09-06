<?php
function userInputSantizer($userInput)
{
    $userInput = preg_replace('#\'#', '&apos;', $userInput);
    $userInput = preg_replace('#\\\#', '', $userInput);
    $userInput = htmlspecialchars($userInput);
    return $userInput;
}