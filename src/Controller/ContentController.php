<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class ContentController extends FrontendController
{
    /**
     * @Template
     */
    public function defaultAction(Request $request)
    {
        return [];
    }
}