<?php

namespace App\Controller;

use App\Repository\ArticleCoucheRepository;
use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

final class PatchArticlesArticleCoucheController extends AbstractController
{
    private $ArticleCoucheRepository;
    private $ArticleRepository;
    private $entityManager;

    public function __construct(ArticleCoucheRepository $ArticleCoucheRepository, ArticlesRepository $ArticleRepository, EntityManagerInterface $entityManager)
    {
        $this->ArticleCoucheRepository = $ArticleCoucheRepository;
        $this->ArticleRepository = $ArticleRepository;
        $this->entityManager = $entityManager;
    }

    public function __invoke(int $id,Request $request, SerializerInterface $serializer): Response
    {
        $articleCouche = $this->ArticleCoucheRepository->find($id);

        if (!$articleCouche) {
            return $this->json(['message' => 'Article Couche not found'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        $newArticles = new ArrayCollection($data['articlesArticleCouche']);

        foreach ($articleCouche->getArticlesArticleCouche() as $article) {
            $articleCouche->removeArticlesArticleCouche($article);
        }

        foreach ($newArticles as $article) {
            $NewArticle = $this->ArticleRepository->find((int)basename($article));
            $articleCouche->addArticlesArticleCouche($NewArticle);
        }

        $this->entityManager->persist($articleCouche);
        $this->entityManager->flush();

        return $this->json($articleCouche, Response::HTTP_OK, [], ['groups' => 'articles_articleCouche:read']);
    }
}
