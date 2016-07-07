<?php

namespace blog\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('blogGeneralBundle:Default:index.html.twig');
    }
    
//     public function indexAction()
//    {
//         $name="Zina";
//         
//        return $this->render('blogGeneralBundle:Default:index.html.twig', array('name'=>$name));
//    }
}
