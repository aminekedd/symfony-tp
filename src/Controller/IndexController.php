<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// class IndexController extends AbstractController
// {
//     /**
//      * @Route("/{name}/{age}")
//      */
//     public function home($name,$age): Response
//     {
//         return $this->render('index/index.html.twig', [
//             'name' => $name,
//             'age' => $age,
//         ]);
//     }
// }

class IndexController extends AbstractController
{
    /**
     * @Route("/article/new", name="new_article")
     * Method({"GET","POST"})
     */
    public function home(): Response
    {
        $list=["article1","article2","article3"];
        return $this->render('articles/index.html.twig', [
            'articles' => $list,
            
        ]);
    }
    public function new (Request $request) {
        $article = new Article();
        $form = $this->createFormBuilder($article)
        ->add('nom', TextType::class)
        ->add('prix', TextType::class)
        ->add('save', SubmitType::class, array('label' => 'Créer')->getForm());

        $form->handleRequest($request);

        if($fotm->isSubmitted() && $form->isValid()) {
            $article = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_list');

        }
        return $this->render('articles/new.html.twig',['form' => $form->createView()]);

    }
}
