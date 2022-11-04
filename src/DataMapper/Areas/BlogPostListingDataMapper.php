<?php

namespace  App\DataMapper\Areas;

use App\DataMapper\AbstractDataMapper;
use Pimcore\Model\DataObject\BlogPost;
use App\DataMapper\Blog\BlogPostTagDataMapper;
/**
 * @property BlogPost $resource
 */
class  BlogPostListingDataMapper extends  AbstractDataMapper

{
        public function toArray($request): array
    {

        $linkGenerator = $this->resource->getClass()->getLinkGenerator();

        return [
          'id' => $this->resource->getId(),
          'image' =>$this->resource->getImage() ?->getImage(),
          'title' =>$this->resource->getTitle(),
          'short_description' =>$this->resource->getShortDescription(),
          'posted' =>$this->resource->getDate()->setTimezone('Europe/Berlin')->format('F j, Y'),
          'slug' => $linkGenerator->generate($this->resource),
          'tags' => BlogPostTagDataMapper::list($this->resource->getTags())->all($request)

        ];
    }
}
