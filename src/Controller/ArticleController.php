<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkExtraBundle\Configuration\Methode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstarctController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="app_article")
     */
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
    public function save() {
        $entityManager = $this->getDoctrine()->getManager();

        $article = new Article();
        $article->setNom('Article 1');
        $article->setPrix(1000);

        $entityManager->persist($article);
        $entityManager->flush();

        return new Response('Article enregistré avec id '.$article->getId());

    }

}
