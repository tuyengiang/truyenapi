<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ChapterRepository;
use App\Entities\Chapter;
use App\Validators\ChapterValidator;

/**
 * Class ChapterRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ChapterRepositoryEloquent extends BaseRepository implements ChapterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Chapter::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
