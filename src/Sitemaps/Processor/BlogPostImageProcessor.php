<?php

namespace App\Sitemaps\Processor;

use Pimcore\Model\DataObject\BlogPost;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Sitemap\Element\GeneratorContextInterface;
use Pimcore\Sitemap\Element\ProcessorInterface;
use Pimcore\Tool;
use Presta\SitemapBundle\Sitemap\Url\Url;
use Presta\SitemapBundle\Sitemap\Url as Sitemap;
use Symfony\Component\DependencyInjection\ContainerInterface;

class BlogPostImageProcessor implements ProcessorInterface
{
    public function __construct(
        private ContainerInterface $container
    )
    {
    }

    public function process(Url $url, ElementInterface $element, GeneratorContextInterface $context)
    {
        if (!$element instanceof BlogPost || empty($element->getImage())) {
            return $url;
        }

        $image = $image->getImage();
        $imageUrl = Tool::getHostUrl($this->container->getParameter('site_protocol')) . $image->getRealFullPatch();

        $decoratedUrl = new Sitemap\GoogleImageUrlDecorator($url);
        $decoratedUrl->addImage(new Sitemap\GoogleImage($imageUrl));

        return $decoratedUrl;
    }

}
