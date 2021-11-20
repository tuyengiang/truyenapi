<?php

namespace App\Entities;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Class Chapter.
 *
 * @package namespace App\Entities;
 */
class Chapter extends Eloquent implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connection = "mongodb";
    protected $collection = "chapters";
    protected $guarded = [];

}
