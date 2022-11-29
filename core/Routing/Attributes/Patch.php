<?php

declare(strict_types=1);

use App\Enums\HttpMethod;
use core\Routing\Route;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Patch extends Route
{
    public function __construct(string $routePath)
    {
        parent::__construct($routePath, HttpMethod::Patch);
    }
}