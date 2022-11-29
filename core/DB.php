<?php

declare(strict_types=1);

namespace core;


use Opis\Database\Connection;
use Opis\ORM\EntityManager;

class DB
{
    private EntityManager $entityManager;

    public function __construct(array $config)
    {
        $connection = new Connection(
            sprintf('dsn:%s;dbname=%s', $config['db']['driver'], $config['db']['database']),
            $config['db']['user'],
            $config['db']['pass'],
            $config['db']['driver']
        );

        $this->entityManager = new EntityManager($connection);
    }

    public function entityManager(): EntityManager
    {
        return $this->entityManager();
    }
}