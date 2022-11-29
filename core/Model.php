<?php

declare(strict_types=1);

namespace core;

abstract class Model
{
    protected DB $em;

    public function __construct()
    {
        $this->em = App::db();
    }
}