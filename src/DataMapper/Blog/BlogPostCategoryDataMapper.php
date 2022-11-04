<?php

namespace  App\DataMapper\Blog;

use App\DataMapper\AbstractDataMapper;
use Pimcore\Model\DataObject\BlogPostCategory;

/**
 * @property BlogPostCategoy $resource
 */
class  BlogPostCategoryDataMapper extends  AbstractDataMapper
{
        public function toArray($request): array
    {
        return [
        'id' => $this->resource->getId(),
        'name' => $this->resource->getName()
        ];
    }
}
