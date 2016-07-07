<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace blog\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \blog\ArticleBundle\Entity\Article;
use blog\ArticleBundle\Form\ArticleType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller {

   
    public function indexAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $articles = $em->getRepository('blogArticleBundle:Article')->findAll();

        return $this->render('blogArticleBundle:Default:ListArticle.html.twig', array('articles' => $articles));
    }

    public function addAction(Request $request) {
        $article = new Article();

        $form = $this->createForm(new ArticleType(), $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article->upload();
            $article->slugify();
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($article);
            $em->flush();

            return $this->redirect($this->generateUrl('blog_article_index'));
        }

        return $this->render('blogArticleBundle:Default:addArticle.html.twig', array(
                    'article' => $article,
                    'form' => $form->createView()
        ));
    }

    public function detailAction($slug) {
        $em = $this->getDoctrine()->getEntityManager();
        $article = $em->getRepository('blogArticleBundle:Article')->findOneBySlug($slug);

        return $this->render('blogArticleBundle:Default:detailArticle.html.twig', array(
                    'article' => $article,
        ));
    }
}