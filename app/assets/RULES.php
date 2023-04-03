<?php

namespace assets;

enum RULES: string
{
    case RULE_REQUIRED = "required";
    case RULE_EMAIL = "email";
    case RULE_MIN = "min";
    case RULE_MAX = "max";
    case RULE_MATCH = "match";
    case RULE_UNIQUE = "unique";

    public static function ruleMessage(): array
    {
        return [
            self::RULE_REQUIRED->name   => "This field is required",
            self::RULE_EMAIL->name      => "This field must be valid email address",
            self::RULE_MIN->name        => "Min length of this field must be {min}",
            self::RULE_MAX->name        => "Max length of this field must be {max}",
            self::RULE_MATCH->name      => "This field must be the same as {match}",
            self::RULE_UNIQUE->name     => "This Email is already exist"
        ];
    }
}