<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Page;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route( "/{url}", name="show_page", defaults={"url":""})
     */
    public function indexAction(Request $request, $url)
    {
        $url = '/'.$url;
        $page = $this->getDoctrine()->getRepository('AppBundle:Page')->findOneByUrl($url);
        return $this->render('blocks/index.html.twig', array('page' => $page));
    }

    /**
     * @Route(name="show_menu")
     */
    public function menuAction(Request $request)
    {
        $pages = $this->getDoctrine()->getRepository('AppBundle:Page')->findAll();
        return $this->render('blocks/menu.html.twig',array('pages' => $pages));
    }
}
