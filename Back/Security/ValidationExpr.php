<?php

namespace Security;

class ValidationExpr
{
    public const REGEX_LEVEL_ONE = "/[\^<\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i";
    public const REGEX_LEVEL_TWO = "";
    public const REGEX_LEVEL_THREE = "";
    public const REGEX_LEVEL_FOUR = "";
    public const REGEX_LEVEL_FIVE = "/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i";


    public function regexMatch(string $word, $regex_level): bool
    {
        return (!preg_match($regex_level, $word));
    }

    public function isStringValid($word, $regex_level): bool
    {
        if (!is_string($word) || $word === "") {
            return false;
        }

        $word = htmlspecialchars($word);

        return $this->regexMatch($word, $regex_level);
    }
}