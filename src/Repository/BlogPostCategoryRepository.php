<?php

namespace App\Repository;


use Pimcore\Model\DataObject\BlogPostCategory;


class BlogPostCategoryRepository
{
    public function all(): array
    {
        $blogPostCategories = new BlogPostCategory\Listing();
        $blogPostCategories->setOrder('asc');
        $blogPostCategories->setOrderkey('name');

        return  $blogPostCategories->load();
    }
}
