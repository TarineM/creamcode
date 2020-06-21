<?php

namespace Security;

class ValidationExpr
{
    public function regexMatch(string $word): bool
    {
        $rexSafety = "/[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|;#]+/i";

        return (!preg_match($rexSafety, $word));
    }

    public function isStringValid($word): bool
    {
        if (!is_string($word) || $word === "") {
            return false;
        }

        $word = htmlspecialchars($word);

        return $this->regexMatch($word);
    }
}