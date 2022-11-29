<?php

namespace App\Repositories;

use App\Model\Post;
use core\DB;
use Opis\ORM\EntityManager;

class PostRepository implements PostRepositoryInterface
{
    private EntityManager $em;

    public function __construct(DB $em)
    {
        $this->em = $em->entityManager();
    }

    public function findOne(int $id): Post
    {
        $this->em->query(Post::class)->find($id);
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    public function findByIds(array $ids): array
    {
        // TODO: Implement findByIds() method.
    }
}