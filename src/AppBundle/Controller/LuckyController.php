<?php

namespace AppBundle\Controller;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("lucky/number/{count}", name="luckyNumber")
     */
    public function NumberAction($count = 5)
    {
        $data = [];
        for ($i = 0; $i < $count; $i++)
            $data[] = rand(0, 100);

        $numbersList = implode(", ", $data);

        $html = $this->render(
            'lucky/number.html.twig',
            ['luckyNumberList'  =>  $numbersList]
        );

        return new Response($html);
    }
}
