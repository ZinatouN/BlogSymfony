<?php

namespace blog\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \blog\ArticleBundle\Entity\Article;
use Doctrine\ORM\EntityManager;

class DefaultController extends Controller {

//     protected $em;
// 
//    public function getEntityManager()
//    {
//        if (null === $this->em) {
//            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
//        }
//        return $this->em;
//    }
//    public function indexAction()
//    {
//        return $this->render('blogArticleBundle:Default:index.html.twig');
//    }


    public function addArticleAction() {
        $art = new Article();

        $em = $this->getDoctrine()->getManager();
        $em->persist($art);
        $em->flush();
        return array('article' => $art);
    }

    public function ListArticleAction() {
        $articles = $this->getEntityManager()->getRepository("blogArticleBundle:Article")->findAll();
        return array('articles' => $articles);
    }

}
