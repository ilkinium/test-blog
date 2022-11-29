<?php

declare(strict_types=1);

use App\Enums\HttpMethod;
use core\Routing\Route;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class Delete extends Route
{
    public function __construct(string $routePath)
    {
        parent::__construct($routePath, HttpMethod::Delete);
    }
}