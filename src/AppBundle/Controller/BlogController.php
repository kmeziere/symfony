<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{

    /**
     * @Route("/blog/{page}", defaults={"page": 1}, requirements={ "page": "\d+" }, name="blog_home")
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($page){
        $products = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findAllOrderedByName();
        return $this->render("blog/index.html.twig", compact('products', 'page'));
    }

    /**
     * @Route("/blog/article/{id}", name="show_article")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id){
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($id);

        if(!$product)
            throw $this->createNotFoundException("L'article n'existe pas llo.");

        return $this->render('blog/show.html.twig', ["product" => $product]);
    }

    /**
     * @Route("/blog/create", name="add_article")
     */
    public function createAction(){
        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(19.99);
        $product->setDescription('Ergonomic and stylish !');

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);

        $em->flush();

        return new Response('Saved new product with id '.$product->getId());
    }

    /**
     * @Route("/blog/article/update/{productId}", name="update_article")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateAction($productId){
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->find($productId);

        if(!$product)
            throw $this->createNotFoundException("L'article n'existe pas.");

        $product->setName('Name modified');
        $em->flush();

        return $this->redirectToRoute('show_article', [ "id" => $product->getId() ]);
    }
}