<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Couches;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticlesController extends AbstractController
{
    #[Route('/api/articles', name: 'app_articles', methods: ['GET'])]
    public function index(ArticlesRepository $repository): Response
    {
        $affaires = $repository->findAll();
        return $this->json($affaires);
    }

    #[Route('api/articles/searchCode/{id}', name: 'serach_article', methods: ['GET'])]
    public function search(int $id, ArticlesRepository $repository): Response
    {
        $articles = $repository->findBy(['id' => $id]);
        return $this->json($articles);
    }

    #[Route('api/articles/categorie', name: 'getCategorieArticle', methods: ['GET'])]
    public function categoriesArticle(ArticlesRepository $repository): Response
    {
        $categories = $repository->findTypes();
        return $this->json($categories);
    }

    #[Route('api/articlesByCategorie/{categorie}', name: 'getArticleByCategorie', methods: ['GET'])]
    public function ArticlesByCategorie(string $categorie, ArticlesRepository $repository): Response
    {
        $articles = $repository->findBy(['categorie_article' => $categorie]);
        return $this->json($articles);
    }

    #[Route('api/articles/couche', name: 'putArticleInCouche', methods: ['POST'])]
    public function putArticleInCouche(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['codeArticle']) || !isset($data['codeCouche'])) {
            return new JsonResponse(['error' => 'Invalid data'], 400);
        }

        $article = $entityManager->getRepository(Articles::class)->find($data['codeArticle']);
        $couche = $entityManager->getRepository(Couches::class)->find($data['codeCouche']);

        $article->setCouche($couche);

        $entityManager->persist($article);
        $entityManager->flush();

        return new JsonResponse($article, 201);
    }
}
