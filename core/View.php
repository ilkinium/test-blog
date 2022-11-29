<?php

declare(strict_types=1);

namespace core;

use App\Exceptions\ViewNotFoundException;

final class View
{
    public function __construct(
        private readonly string $view,
        private readonly array $params = []
    ) {
    }

    public static function make(string $view, array $params = []): View
    {
        return new View($view, $params);
    }

    /**
     * @throws ViewNotFoundException
     */
    public function render(): string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        foreach($this->params as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include $viewPath;

        return (string) ob_get_clean();
    }

    /**
     * @throws ViewNotFoundException
     */
    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name): ?string
    {
        return $this->params[$name] ?? null;
    }
}