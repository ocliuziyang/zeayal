<?php

namespace App\Transformers;

use Carbon\Carbon;
use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class UserTransformer extends TransformerAbstract
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
			'name' => $resource->name,
			'email' => $resource->email,
			'real_name' => $resource->real_name,
			'phone_number' => $resource->phone_number,
			'sex' => (bool) $resource->sex,
			'birthday' => $resource->birthday,
			'bio' => $resource->bio,
            'avatar' => $resource->avatar,
			'created_at' => $resource->created_at->toDateTimeString(),
			'updated_at' => $resource->updated_at->toDateTimeString(),
			
        ];
    }
}
