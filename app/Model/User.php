<?php

namespace App\Model;

use Opis\ORM\Entity;
use Opis\ORM\IEntityMapper;
use Opis\ORM\IMappableEntity;

class User extends Entity implements IMappableEntity
{
    public function getId(): int
    {
        return $this->orm()->getColumn('id');
    }

    public function getName(): string
    {
        return $this->orm()->getColumn('name');
    }

    public function setName(string $name): self
    {
        $this->orm()->setColumn('name', $name);

        return $this;
    }

    public function getEmail(): string
    {
        return $this->orm()->getColumn('email');
    }

    public function setEmail(string $email): self
    {
        $this->orm()->setColumn('email', $email);

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->orm()->setColumn('password', password_hash($password, PASSWORD_BCRYPT));

        return $this;
    }

    /**
     * @inheritDoc
     */
    public static function mapEntity(IEntityMapper $mapper)
    {
        $mapper->cast([
            'id' => 'integer'
        ]);

        $mapper->relation('post')->hasMany(Post::class);
        $mapper->relation('comment')->hasMany(Comment::class);
    }
}