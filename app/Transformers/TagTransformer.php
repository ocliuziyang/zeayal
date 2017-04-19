<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class TagTransformer extends TransformerAbstract
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
			'fid' => (int) $resource->fid,
			'name' => $resource->name,
			'description' => $resource->description,
            'thumbnail' => $resource->thumbnail,
			'created_at' => $resource->created_at->toDateTimeString(),
			'updated_at' => $resource->updated_at->toDateTimeString(),
			
        ];
    }
}
