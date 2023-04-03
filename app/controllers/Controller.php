<?php

namespace controllers;

class Controller
{
    public function __construct(protected string $layout)
    {
    }

    public function render($view, $args): void
    {
        $layout = $this->renderLayout($args);
        $viewContent = $this->getViewContent($view, $args);
        if (array_key_exists("message", $args)) {
            echo str_replace(
                ['{{content}}', '{{pageName}}', "{{message}}", "{{message_type}}"],
                [$viewContent, $args["pageName"], $args['message'], $args["message_type"]], $layout);
        } else {
            echo str_replace(
                ['{{content}}', '{{pageName}}'],
                [$viewContent, $args["pageName"]], $layout);
        }
    }

    public function renderLayout($args = []):string
    {
        ob_start();
        include_once VIEW_PATH . "/layout/{$this->layout}.php";
        return ob_get_clean();
    }

    protected function getViewContent($view, $args = []):string
    {
        ob_start();
        include_once VIEW_PATH . "/$view.php";
        return ob_get_clean();
    }
}