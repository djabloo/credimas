<?php

namespace  App\DataMapper\Blog;

use App\DataMapper\AbstractDataMapper;
use Pimcore\Model\DataObject\BlogPost;
use App\DataMapper\Blog\BlogPostTagDataMapper;
use App\DataMapper\Blog\RelatedBlogPostsDataMapper;
use Pimcore\Model\User;

/**
 * @property BlogPost $resource
 */
class  BlogPostShowDataMapper extends  AbstractDataMapper

{
        public function toArray($request): array
    {
        $postedBy = User::getById($this->resource->getPostedBy());

        $seoImage = $this->resource->getSeoImage();

        if (empty($seoImage)){
            $seoImage = $this->resource->getImage();
        }

        return [
          'id' => $this->resource->getId(),
          'image' => $this->resource->getImage() ?->getImage(),
          'title' => $this->resource->getTitle(),
          'short_description' => $this->resource->getShortDescription(),
          'content' => $this->resource->getContent(),
          'posted' => $this->resource->getDate()->setTimezone('Europe/Berlin')->format('F j, Y'),
          'posted_by' => $postedBy->getFirstName(),
          'about' => $this->resource->getAbout(),
          'ad' => $this->resource->getAd(),
          'cannonical_url' => $this->resource->getCannonicalUrl(),
          'seo_title' => $this->resource->getCannonicalUrl(),
          'seo_description' => $this->resource->getShortDescription(),
          'og_url' => $this->resource->getOgUrl(),
          'og_local' => $this->resource->getOgLocal(),
          'seo_image' => $this->resource->getSeoImage(),
          'tags' => BlogPostTagDataMapper::list($this->resource->getTags())->all($request),
          'related_blog_posts' => RelatedBlogPostsDataMapper::list($this->resource->getRelatedBlogPosts())->all($request)
        ];
    }
}
