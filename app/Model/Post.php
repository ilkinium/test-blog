<?php

namespace App\Model;

use Opis\ORM\Entity;
use Opis\ORM\IEntityMapper;
use Opis\ORM\IMappableEntity;

class Post extends Entity implements IMappableEntity
{
    public function getId(): int
    {
        return $this->orm()->getColumn('id');
    }

    public function getTitle(): string
    {
        return $this->orm()->getColumn('title');
    }

    public function setTitle(string $title): self
    {
        $this->orm()->setColumn('title', $title);

        return $this;
    }

    public function getBody(): string
    {
        return $this->orm()->getColumn('title');
    }

    public function setBody(string $body): self
    {
        $this->orm()->setColumn('body', $body);

        return $this;
    }

    public function getComments(): ?array
    {
        return $this->orm()->getRelated('comment');
    }

    public function setComments(Comment $comment): self
    {
        $this->orm()->setRelated('comment', $comment);

        return $this;
    }

    public static function mapEntity(IEntityMapper $mapper)
    {
        $mapper->cast([
            'id' => 'integer'
        ]);

        $mapper->relation('comment')->hasMany(Comment::class);
        $mapper->useTimestamp();
    }
}