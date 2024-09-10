<?php
function outputSantizer($userInput)
{
    $userInput = preg_replace('#\'#', '&apos;', $userInput);
    $userInput = preg_replace('#\\\#', '', $userInput);
    $userInput = htmlspecialchars($userInput);
    return $userInput;
}