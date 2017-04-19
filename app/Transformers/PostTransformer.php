<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class PostTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var $resource
     * @return array
     */
    public function transform($resource)
    {
        return [

            'id' => (int) $resource->id,
			'title' => $resource->title,
			'slug' => $resource->slug,
			'description' => $resource->description,
			'content_raw' => $resource->content_raw,
			'content_html' => $resource->content_html,
			'published_at' => $resource->published_at,
			'is_draft' => (bool) $resource->is_draft,
			'author' => $resource->author,
			'created_at' => $resource->created_at,
			'updated_at' => $resource->updated_at,
			
        ];
    }
}
