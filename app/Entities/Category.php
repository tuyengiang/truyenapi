<?php

namespace App\Entities;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Class Category.
 *
 * @package namespace App\Entities;
 */
class Category extends Eloquent implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connection = "mongodb";
    protected $collection = "categories";
    protected $guarded = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }

}
