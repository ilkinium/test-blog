<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Enums\HttpMethod;
use core\Routing\Route;
use Get;
use Twig\Environment as Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class PostController
{
    public function __construct(private Twig $twig)
    {
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    #[Get('/')]
    #[Route('/post', HttpMethod::Head)]
    public function index(): string
    {
        return $this->twig->render('post/index.twig');
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    #[Route('/post/new', HttpMethod::Get)]
    public function create(): string
    {
        return $this->twig->render('post/form.twig');
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    #[Route('/post/:id/edit', HttpMethod::Get)]
    public function edit(): string
    {
//        $article = ;
        return $this->twig->render('post/form.twig');
    }

    #[Route('/post/save', HttpMethod::Post)]
    public function save()
    {
        // TODO: implement post article saving
    }
}