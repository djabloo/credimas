<?php

namespace  App\DataMapper\Blog;

use App\DataMapper\AbstractDataMapper;
use Pimcore\Model\DataObject\BlogPostTag;
use App\DataMapper\Blog\BlogPostTagDataMapper;

/**
 * @property BlogPostTag $resource
 */
class  BlogPostTagDataMapper extends  AbstractDataMapper
{
        public function toArray($request): array
    {

        return [
        'id' => $this->resource->getId(),
        'name' => $this->resource->getName()
        ];
    }
}
