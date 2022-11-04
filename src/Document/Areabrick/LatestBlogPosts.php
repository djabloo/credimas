<?php

namespace App\Document\Areabrick;

use App\DataMapper\Areas\LatestBlogPostsDataMapper;
use Pimcore\Model\DataObject\BlogPost;
use Pimcore\Model\Document\Editable\Area\Info;
use Symfony\Component\HttpFoundation\Request;


class LatestBlogPosts extends AbstractAreabrick
{
    public function getName(): string
    {
        return 'Latest Blog Posts';
    }

    public function action(Info $info)
    {
        $blogPosts = new BlogPost\Listing();
        $blogPosts->setOrderKey('date');
        $blogPosts->setOrder('desc');
        $blogPosts->setLimit(3);

        $info->setParams(
            [
                'blog_posts' => LatestBlogPostsDataMapper::List($blogPosts->load())->all(new Request())
            ]
        );
    }

}