<?php

namespace core;

class Request
{
    public function getPath(): array
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        $argsString = substr($path, $position + 1) ?? null;
        $args = $this->getArgs($argsString);

        if (!$position) {
            return [$path, $args];
        }

        $path = substr($path, 0, $position);

        return [$path, $args];
    }

    public function getRequestMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody(): array
    {
        if ($this->getRequestMethod() === 'get') {
            return $_GET;
        }elseif ($this->getRequestMethod() === 'post') {
            return $_POST;
        } else {
            return [];
        }
    }
    public function getArgs(string $argsString): array
    {
        $args = [];
        if ($argsString) {
            $chunks = explode('&', $argsString);


            foreach ($chunks as $value) {
                $args[explode('=', $value)[0]] = explode('=', $value)[1] ?? null;
            }
        }
        return $args;
    }
}