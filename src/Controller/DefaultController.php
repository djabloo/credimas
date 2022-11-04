<?php

namespace App\Controller;

use App\DataMapper\Areas\LatestBlogPostsDataMapper;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\BlogPost;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;



class DefaultController extends FrontendController

{
    /**
    * @Route ("/testing-url", name="testing_url")
    */

   public function test(Request $request)
    {
        $test = BlogPost::getById(12);

      dd((new LatestBlogPostsDataMapper($test))->toArray($request));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function defaultAction(Request $request): Response
    {
        return $this->render('default/default.html.twig');

    }
      /**
     * @param Request $request
     * @return Response
     */
    public function footerAction(Request $request): Response
    {
        return $this->render('include/footer.html.twig');

    }
    /**
     * @param Request $request
     * @return Response
     */
    public function errorAction(Request $request): Response
    {
        return $this->render('error/404.html.twig');

    }

}
