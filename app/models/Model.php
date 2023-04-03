<?php
declare(strict_types=1);

namespace models;

use assets\RULES;

abstract class Model
{

    public array $errors = [];
    public function loadData($data): void
    {
        foreach ($data as $key => $value)
        {
            if (property_exists($this, $key))
            {
                $this->{$key} = $value;
            }
        }
    }
    public function validateData():bool
    {
        foreach ($this->rules() as $attribute => $rules)
        {
            $value = $this->{$attribute};
            foreach ($rules as $rule)
            {
                $ruleName = $rule;
                if (is_array($ruleName))
                {
                    $ruleName = $rule[0];
                }
                // Test the errors
                if ($ruleName == 'RULE_REQUIRED' && empty($value))
                {
                    $this->registerViolation($attribute, RULES::RULE_REQUIRED->name);
                }
                if ($ruleName == 'RULE_EMAIL' && !filter_var($value, FILTER_VALIDATE_EMAIL))
                {
                    $this->registerViolation($attribute, RULES::RULE_EMAIL->name);
                }
                if ($ruleName == 'RULE_UNIQUE'  && static::getUser('email', $this->email))
                {
                    $this->registerViolation($attribute, RULES::RULE_UNIQUE->name);
                }
                if ($ruleName == 'RULE_MIN' && strlen($value) < $rule['min'])
                {
                    $this->registerViolation($attribute, RULES::RULE_MIN->name, $rule);
                }
                if ($ruleName == 'RULE_MAX' && strlen($value) > $rule['max'])
                {
                    $this->registerViolation($attribute, RULES::RULE_MAX->name, $rule);
                }
                if ($ruleName == 'RULE_MATCH' && $value !== $this->{$rule['match']})
                {
                    $this->registerViolation($attribute, RULES::RULE_MATCH->name, $rule);
                }
            }
        }
        return empty($this->errors);
    }

    public function registerViolation(string $attribute, string $rule, array $params = []): void
    {
        $violation_message = RULES::ruleMessage()[$rule] ?? "";

        foreach ($params as $key => $value) {
            $violation_message = str_replace("{{$key}}", "$value", $violation_message);
        }

        $this->errors[$attribute][] = $violation_message;
    }

    abstract protected function rules():array;
}