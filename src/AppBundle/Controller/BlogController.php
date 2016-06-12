<?php


namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{

    /**
     * @Route("/blog/{page}", defaults={"page": 1}, requirements={ "page": "\d+" }, name="blog_home")
     * @param $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($page){
        $posts = array(
            "1" => [
                "slug"      =>  "ici-un-slug",
                "title"     =>  "un titre 1",
                "content"   =>  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in metus ultricies, vestibulum erat non, ullamcorper magna. Maecenas felis leo, elementum a elit vel, facilisis sollicitudin elit. Duis gravida orci felis, a pharetra nulla vestibulum quis. Ut purus ligula, sagittis eu tincidunt quis, consequat id justo. Aliquam aliquet consequat enim, vel rhoncus urna bibendum a. Mauris faucibus metus pellentesque, efficitur lorem quis, molestie nisi. Suspendisse potenti. Nullam nisi lectus, efficitur nec lacinia id, tristique ac velit. Proin sed porttitor purus, quis lobortis tortor. Fusce mattis a nunc id elementum. Cras nulla eros, finibus pellentesque egestas vitae, sollicitudin sed nulla. Vestibulum egestas, mauris at dictum varius, risus metus consectetur magna, lacinia imperdiet turpis justo ac justo. Nullam suscipit, nisi a sodales sodales, lorem ante auctor leo, vel dictum magna leo vitae lorem. Ut eu lacus non neque pulvinar tristique.",
                "image"     =>  "sexy.png"
            ],
            "2" => [
                "slug"      =>  "ici-un-slug-num-2",
                "title" =>  "un titre 2",
                "content"   =>  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in metus ultricies, vestibulum erat non, ullamcorper magna. Maecenas felis leo, elementum a elit vel, facilisis sollicitudin elit. Duis gravida orci felis, a pharetra nulla vestibulum quis. Ut purus ligula, sagittis eu tincidunt quis, consequat id justo. Aliquam aliquet consequat enim, vel rhoncus urna bibendum a. Mauris faucibus metus pellentesque, efficitur lorem quis, molestie nisi. Suspendisse potenti. Nullam nisi lectus, efficitur nec lacinia id, tristique ac velit. Proin sed porttitor purus, quis lobortis tortor. Fusce mattis a nunc id elementum. Cras nulla eros, finibus pellentesque egestas vitae, sollicitudin sed nulla. Vestibulum egestas, mauris at dictum varius, risus metus consectetur magna, lacinia imperdiet turpis justo ac justo. Nullam suscipit, nisi a sodales sodales, lorem ante auctor leo, vel dictum magna leo vitae lorem. Ut eu lacus non neque pulvinar tristique.",
                "image"     =>  "dropbox/images/sexy.png"
            ]
        );
        return $this->render("blog/index.html.twig", compact('posts', 'page'));
    }

    /**
     * @Route("/blog/article/{id}/{slug}", name="show_article")
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id, $slug){
        $posts = array(
            "1" => [
                "slug"      =>  "ici-un-slug",
                "title"     =>  "un titre 1",
                "content"   =>  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in metus ultricies, vestibulum erat non, ullamcorper magna. Maecenas felis leo, elementum a elit vel, facilisis sollicitudin elit. Duis gravida orci felis, a pharetra nulla vestibulum quis. Ut purus ligula, sagittis eu tincidunt quis, consequat id justo. Aliquam aliquet consequat enim, vel rhoncus urna bibendum a. Mauris faucibus metus pellentesque, efficitur lorem quis, molestie nisi. Suspendisse potenti. Nullam nisi lectus, efficitur nec lacinia id, tristique ac velit. Proin sed porttitor purus, quis lobortis tortor. Fusce mattis a nunc id elementum. Cras nulla eros, finibus pellentesque egestas vitae, sollicitudin sed nulla. Vestibulum egestas, mauris at dictum varius, risus metus consectetur magna, lacinia imperdiet turpis justo ac justo. Nullam suscipit, nisi a sodales sodales, lorem ante auctor leo, vel dictum magna leo vitae lorem. Ut eu lacus non neque pulvinar tristique.",
                "image"     =>  "sexy.png"
            ],
            "2" => [
                "slug"      =>  "ici-un-slug-num-2",
                "title" =>  "un titre 2",
                "content"   =>  "contenu lorem ipsum",
                "image"     =>  "dropbox/images/sexy.png"
            ]
        );

        if(!isset($posts[$id]) || $posts[$id]["slug"] !== $slug)
            throw $this->createNotFoundException("L'article n'existe pas.");

        return $this->render('blog/show.html.twig', ["post" => $posts[$id], $slug]);
    }
}