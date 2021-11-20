<?php

namespace App\Entities;

use Prettus\Repository\Contracts\Transformable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class CategoryStore.
 *
 * @package namespace App\Entities;
 */
class CategoryStore extends Eloquent implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connection = "mongodb";
    protected $collection = "category_store";
    protected $guarded = [];

}
