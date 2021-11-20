<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CategoryStoreRepository;
use App\Entities\CategoryStore;
use App\Validators\CategoryStoreValidator;

/**
 * Class CategoryStoreRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoryStoreRepositoryEloquent extends BaseRepository implements CategoryStoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryStore::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
