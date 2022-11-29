<?php

namespace App\Repositories;

use App\Model\Post;

interface PostRepositoryInterface
{
    public function findOne(int $id): Post;

    public function findAll(): array;

    public function findByIds(array $ids): array;
}