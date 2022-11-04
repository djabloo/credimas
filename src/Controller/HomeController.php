<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends FrontendController
{
    /**
    * @Template
    * @param Request $request
    * @return array
    */
    public function indexAction(Request $request)
    {
        return [];
    }
}